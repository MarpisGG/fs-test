import React from "react";
import { Link, useNavigate } from "react-router-dom";

function AdminNavbar() {
    const navigate = useNavigate();

    // Check if the user is logged in and is an admin
    const userData = localStorage.getItem("user");
    const user = userData ? JSON.parse(userData) : null;
    const isAdmin = user && user.id === 1;

    if (!isAdmin) {
        return null; // Don't render the navbar if not authorized
    }

    // Logout function
    const handleLogout = () => {
        localStorage.removeItem("user");
        navigate("/"); // Redirect to homepage or login
    };

    return (
        <nav className="bg-gray-800 text-white px-4 py-3 shadow-md">
            <div className="flex items-center justify-between max-w-7xl mx-auto">
                <div className="text-xl font-semibold"><a href="/admin">
                Admin Panel
                </a>
                </div>
                <div className="space-x-4">
                    <Link to="/admin" className="hover:underline">
                        Add Blog
                    </Link>
                    <Link to="/adminblogs" className="hover:underline">
                        Show All Blog
                    </Link>
                    <Link to="/" className="hover:underline">
                        Home
                    </Link>
                    <button onClick={handleLogout} className="hover:underline text-red-400">
                        Logout
                    </button>
                </div>
            </div>
        </nav>
    );
}

export default AdminNavbar;
