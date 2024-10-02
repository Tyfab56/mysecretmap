// js/routes.js
export default [
    {
        path: "/",
        url: "./pages/home.html",
    },
    {
        name: "main",
        path: "/main/",
        url: "./pages/main.html",
    },
    {
        name: "installicon",
        path: "/installicon/",
        url: "./pages/installicon.html",
    },
    {
        path: "(.*)",
        url: "./pages/404.html",
    },
];
