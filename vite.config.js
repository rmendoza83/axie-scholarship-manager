import { defineConfig, splitVendorChunkPlugin } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [
    splitVendorChunkPlugin(),
    laravel({
      input: ["resources/sass/app.scss", "resources/js/app.ts"],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: [
      {
        find: /~(.+)/,
        replacement: `${process.cwd()}/node_modules/$1`,
      },
      {
        find: "vue",
        replacement: "vue/dist/vue.esm-bundler",
      },
    ],
  },
});
