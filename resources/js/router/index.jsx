import React from "react";
import { Routes, Route } from "react-router-dom";


import Login from "../components/Login";
import Admin from "../components/Admin/Admin";
import AdminBlogs from "../components/Admin/AdminBlogs";
import Landing from "../components/Landing";
import BlogDetail from "../components/BlogDetail";



function index() {
    return (
        <div>
            <Routes>
                <Route path="/Login" element={<Login />} />
                <Route path="/Admin" element={<Admin />} />
                <Route path="/AdminBlogs" element={<AdminBlogs />} />
                <Route path="/" element={<Landing />} />
                <Route path="/blog/:slug" element={<BlogDetail />} />
            </Routes>
        </div>
    );
}

export default index;
