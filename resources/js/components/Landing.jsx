import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function landing() {
  const [allPosts, setAllPosts] = useState([]);
  const [displayed, setDisplayed] = useState([]);
  const [search, setSearch] = useState("");
  const [page, setPage] = useState(1);
  const perPage = 9;

  // Fetch the posts
useEffect(() => {
  fetch("http://127.0.0.1:8000/api/blog", {
    headers: { "Content-Type": "application/json" }
  })
    .then((r) => {
      if (!r.ok) {
        throw new Error("Network response was not ok");
      }
      return r.json();
    })
    .then((data) => {
      setAllPosts(data);
      setDisplayed(data.slice(0, perPage));
    })
    .catch((err) => {
      console.error("Failed to fetch posts:", err);
    });
}, []);

  // Filter + paginate
  const filtered = allPosts.filter((p) =>
    p.title.toLowerCase().includes(search.toLowerCase())
  );

  const loadMore = () => {
    const next = page + 1;
    setDisplayed(filtered.slice(0, next * perPage));
    setPage(next);
  };

  return (
    <div className="bg-gray-100  min-h-screen">

      {/* Header */}
      <header className="text-center py-16 px-8">
        <p className="text-sm uppercase mb-2">Our blog</p>
        <h1 className="text-4xl font-bold  mb-4">
          Insights for Everyone
        </h1>
        <p className="text-lg  mb-6 max-w-2xl mx-auto">
          Explore a wide range of topics, from tips to trends, with something for all readers.
        </p>
        <input
          type="text"
          value={search}
          onChange={(e) => {
            setSearch(e.target.value);
            setPage(1);
            setDisplayed(
              allPosts
                .filter((p) =>
                  p.title.toLowerCase().includes(e.target.value.toLowerCase())
                )
                .slice(0, perPage)
            );
          }}
          placeholder="Search"
          className="px-4 py-2 w-full max-w-md rounded-full border focus:outline-none"
        />
      </header>

    {/* Grid */}
        <main className="container mx-auto px-4 pb-16">
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {displayed.map((post) => (
            <Link
              key={post.id}
              to={`/blog/${post.slug}`}
              className="block bg-white rounded-lg shadow hover:shadow-lg overflow-hidden"
            >
              {post.image && (
                <img
                src={post.image}

                className="w-full h-48 object-cover"
                />
              )}
              <div className="p-6">
                <h2 className="mt-2 text-xl font-semibold ">
                {post.title}
                </h2>
                <p className="mt-2 text-gray-600 line-clamp-3">
                {post.content.split(' ').slice(0, 100).join(' ')}
                {post.content.split(' ').length > 100 ? '...' : ''}
                </p>
                <div className="mt-4 flex items-center text-sm text-gray-500">
                <time>
                  {new Date(post.updated_at).toLocaleDateString()}
                </time>
                </div>
              </div>
            </Link>
            ))}
          </div>

          {/* Load More */}
        {displayed.length < filtered.length && (
          <div className="text-center mt-12">
            <button
              onClick={loadMore}
              className="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition"
            >
              <svg
                className="w-5 h-5 mr-2"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M12 19V6m0 0l-7 7m7-7l7 7"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                />
              </svg>
              Load more
            </button>
          </div>
        )}
      </main>
    </div>
  );
}
