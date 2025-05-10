import React, { useState, useEffect } from "react";
import winniLogo from "../../../assets/img/winniLogo.png";
import { useNavigate } from "react-router-dom";
import AdminNavbar from "./AdminNavbar";

function Admin() {
const [formData, setFormData] = useState({ title: "", content: "", file: null });
  const [blogs, setBlogs] = useState([]);
  const [isAuthorized, setIsAuthorized] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const [editMode, setEditMode] = useState(false);
  const [blogId, setBlogId] = useState(null);
  const navigate = useNavigate();

  // Auth & initial fetch
  useEffect(() => {
    const userData = localStorage.getItem("user");
    if (!userData) return navigate("/login");
    const user = JSON.parse(userData);
    if (user.id !== 1) return navigate("/login");
    setIsAuthorized(true);
    setIsLoading(false);
    fetchBlogs();
  }, [navigate]);

  // Helper to extract bearer header
  const getHeaders = (isJson = false) => {
    const token = localStorage.getItem("token");
    const headers = {};
    if (token) headers["Authorization"] = `Bearer ${token}`;
    if (isJson) headers["Content-Type"] = "application/json";
    return headers;
  };

  // Fetch all blogs
  const fetchBlogs = async () => {
    try {
      const res = await fetch("http://localhost:8000/api/blog", {
        headers: getHeaders(true),
      });
      if (!res.ok) throw new Error("Failed to load");
      const data = await res.json();
      setBlogs(data);
    } catch (err) {
      console.error("Fetch blogs error", err);
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((p) => ({ ...p, [name]: value }));
  };
  const handleFileChange = (e) => {
    setFormData((p) => ({ ...p, file: e.target.files[0] }));
  };

  const resetForm = () => {
    setFormData({ title: "", content: "", file: null });
    setEditMode(false);
    setBlogId(null);
    const fileInput = document.querySelector('input[type="file"]');
    if (fileInput) fileInput.value = "";
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const payload = new FormData();
    payload.append("title", formData.title);
    payload.append("content", formData.content);
    if (formData.file) payload.append("image", formData.file);
    if (editMode) payload.append("_method", "PUT");

    try {
      const url = editMode
        ? `http://localhost:8000/api/blog/${blogId}`
        : "http://localhost:8000/api/blog";

      const res = await fetch(url, {
        method: "POST", // always POST with method override
        headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
        body: payload,
      });

      if (res.status === 422) {
        const errData = await res.json();
        const message = Object.values(errData.errors).flat().join("<br>");
        return Swal.fire({ icon: "error", title: "Validation Error", html: message });
      }
      if (!res.ok) throw new Error("Network response was not ok");

      Swal.fire("Success", `Blog ${editMode ? "updated" : "created"}!`, "success");
      resetForm();
      fetchBlogs();
    } catch (err) {
      console.error("Submit error", err);
      Swal.fire("Error", "Upload failed", "error");
    }
  };

  const handleEdit = (b) => {
    setEditMode(true);
    setBlogId(b.id);
    setFormData({ title: b.title, content: b.content, file: null });
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  const handleDelete = async (id) => {
    try {
      const result = await Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      });
      if (!result.isConfirmed) return;

      const res = await fetch(`http://localhost:8000/api/blog/${id}`, {
        method: "DELETE",
        headers: getHeaders(true),
      });
      if (!res.ok) throw new Error("Delete failed");
      Swal.fire("Deleted", "Blog removed", "success");
      fetchBlogs();
    } catch {
      Swal.fire("Error", "Delete failed", "error");
    }
  };

  if (isLoading) return <div className="text-center text-xl mt-10">Loading...</div>;
  if (!isAuthorized)
    return <div className="text-center text-xl mt-10">Unauthorized — redirecting...</div>;

  return (
    <>
        <AdminNavbar />
    <div className="bg-gray-100 min-h-screen">
      <div className="flex justify-center items-start py-12 px-4">
        <div className="w-full max-w-4xl space-y-12">
          {/* Form Card */}
          <div className="bg-white p-8 rounded-xl shadow-lg">
            <h1 className="text-2xl font-bold mb-4 text-center">{editMode ? "Edit Blog" : "Add Blog"}</h1>
            <form onSubmit={handleSubmit} className="space-y-6">
              <div>
                <label className="block text-sm font-semibold mb-1">Title</label>
                <input
                  name="title"
                  value={formData.title}
                  onChange={handleChange}
                  required
                  className="w-full p-3 bg-purple-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
              </div>
              <div>
                <label className="block text-sm font-semibold mb-1">Content</label>
                <textarea
                  name="content"
                  rows="16"
                  value={formData.content}
                  onChange={handleChange}
                  required
                  className="w-full p-3 bg-purple-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 resize-y"
                />
              </div>
              <div>
                <label className="block text-sm font-semibold mb-1">Image (optional)</label>
                <input
                  type="file"
                  onChange={handleFileChange}
                  accept="image/jpeg,image/png,image/jpg,image/gif"
                />
                <p className="text-xs text-gray-500 mt-1">
                  Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)
                </p>
              </div>
              <div className="flex space-x-4">
                <button
                  type="submit"
                  className="px-6 py-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-medium rounded-lg"
                >
                  {editMode ? "Update" : "Submit"}
                </button>
                {editMode && (
                  <button
                    type="button"
                    onClick={resetForm}
                    className="px-6 py-2 bg-red-500 text-white rounded-lg"
                  >
                    Cancel
                  </button>
                )}
              </div>
            </form>
          </div>

          {/* Blog List */}
          <div>
            <h2 className="text-2xl font-bold mb-4">All Blogs</h2>
            <div className="space-y-4">
              {blogs.length > 0 ? (
                blogs.map((b) => (
                  <div
                    key={b.id}
                    className="bg-white p-6 rounded-xl shadow-md flex justify-between items-center"
                  >
                    <div>
                      <h3 className="text-lg font-semibold">{b.title}</h3>
                      <p className="text-sm text-gray-600 truncate"> {b.content.length > 100 ? b.content.slice(0, 100) + '...' : b.content}</p>
                    </div>
                    <div className="space-x-3">
                      <button
                        onClick={() => handleEdit(b)}
                        className="text-blue-600 hover:underline"
                      >
                        Edit
                      </button>
                      <button
                        onClick={() => handleDelete(b.id)}
                        className="text-red-600 hover:underline"
                      >
                        Delete
                      </button>
                    </div>
                  </div>
                ))
              ) : (
                <p className="text-gray-500">No blogs found. Create your first blog post!</p>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
    </>
  );
}

export default Admin;