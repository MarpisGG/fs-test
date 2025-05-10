import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import DOMPurify from 'dompurify';

function BlogDetail() {
    const { slug } = useParams(); // Mendapatkan slug dari URL params
    const [post, setPost] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchPost = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/blog/${slug}`);
                if (!response.ok) {
                    throw new Error("Failed to fetch blog post");
                }
                const data = await response.json();
                setPost(data);
            } catch (error) {
                console.error("Failed to fetch blog post:", error);
            } finally {
                setLoading(false);
            }
        };

        fetchPost();
    }, [slug]);

    // Menampilkan loading atau pesan jika data tidak ditemukan
    if (loading) return <div className="p-4">Loading...</div>;
    if (!post) return <div className="p-4 text-red-500">Blog not found</div>;

    return (
    
    <>
        <div className="max-w-4xl mx-auto px-4 py-8">
            <a href="/" className="text-blue-500 hover:underline my-8 mx-auto">Go Back</a>
            <h1 className="text-3xl font-bold mb-4">{post.title}</h1>
            
            {post.created_at && (
                <p className="text-gray-500 mb-4">
                    Published on {new Date(post.created_at).toLocaleDateString()}
                </p>
            )}
            {/* Menampilkan gambar jika tersedia */}
            {post.image && (
                <img
                    src={post.image}
                    alt={post.title}
                    className="w-[100%] rounded-lg mb-6"
                />
            )}


            {/* Menampilkan konten dengan sanitasi HTML */}
            <div
                className="text-gray-700 leading-relaxed"
                dangerouslySetInnerHTML={{
                    __html: DOMPurify.sanitize(post.content),
                }}
            />
        </div>
    </>
    );
}

export default BlogDetail;
