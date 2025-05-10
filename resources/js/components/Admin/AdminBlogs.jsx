import React, { useEffect, useState } from "react";
import axios from "axios";
import AdminNavbar from "./AdminNavbar";
import { useNavigate } from "react-router-dom";

function AdminBlogs() {
  const [Blog, setBlog] = useState([]);
  const [loading, setLoading] = useState(true);
  const [isAuthorized, setIsAuthorized] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    // Check if user is authorized (ID === 1)
    const checkAuth = () => {
      try {
        const userData = localStorage.getItem("user");

        if (!userData) {
          // No user data found
          setIsAuthorized(false);
          navigate("/login");
          return;
        }

        const user = JSON.parse(userData);

        if (user && user.id === 1) {
          setIsAuthorized(true);
        } else {
          // User exists but is not admin (ID !== 1)
          setIsAuthorized(false);
          navigate("/");
        }
      } catch (error) {
        console.error("Auth check error:", error);
        setIsAuthorized(false);
        navigate("/login");
      } finally {
        setIsLoading(false);
      }
    };

    checkAuth();
  }, [navigate]);

  useEffect(() => {
    const fetchBlog = async () => {
      try {
        const response = await axios.get("http://localhost:8000/api/blog");
        setBlog(response.data);
        setLoading(false);
      } catch (error) {
        console.error("Error fetching blog:", error);
        setLoading(false);
      }
    };

    fetchBlog();
  }, []);

  // Show loading state while checking authorization or loading Blog
  if (isLoading) {
    return <div className="text-center text-xl">Loading...</div>;
  }

  // If not authorized, redirect to login
  if (!isAuthorized) {
    return <div className="text-center text-xl">You are not authorized to view this page. Redirecting...</div>;
  }

  // When Blog are being loaded
  if (loading) {
    return <div className="text-center text-xl">Loading Blog...</div>;
  }

  return (
    <>
      <AdminNavbar />
      <div className="min-h-screen bg-gray-100">
        <div className="p-8 max-w-screen-xl mx-auto">
          <h1 className="text-4xl font-semibold text-gray-800 mb-6">All Blog</h1>
          
          {Blog.length === 0 ? (
            <p className="text-xl text-gray-600">No Blog yet.</p>
          ) : (
            <div className="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
              <table className="w-full table-auto text-sm text-left">
                <thead className="bg-gray-50 border-b">
                  <tr>
                    <th className="px-4 py-3 text-gray-600">Title</th>
                    <th className="px-4 py-3 text-gray-600">Content</th>
                    <th className="px-4 py-3 text-gray-600">Image</th>
                  </tr>
                </thead>
                <tbody>
                  {Blog.map((Blog) => (
                    <tr key={Blog.id} className="border-b hover:bg-gray-50">
                      <td className="px-4 py-3">{Blog.title}</td>
                      <td className="px-4 py-3">{Blog.content}</td>
                      <td className="px-4 py-3">
                        {Blog.file ? (
                          <a
                            href={`http://localhost:8000/storage/${Blog.image}`}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="text-blue-600 hover:underline"
                          >
                            View File
                          </a>
                        ) : (
                          <span className="text-gray-500">No file</span>
                        )}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          )}
        </div>
      </div>
    </>
  );
}

export default AdminBlogs;