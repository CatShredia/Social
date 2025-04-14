import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/css/adminlte.css",
                "resources/css/mytailwind.css",
                "resources/js/app.js",
                "resources/js/adminlte.js",
            ],
            refresh: true,
        }),
    ],
});
