/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        digice: {
          navy:        "#0A1628",
          midnight:    "#0D2147",
          royal:       "#1565C0",
          cyan:        "#29B6C8",
          "cyan-soft": "#7ADCE8",
          white:       "#FFFFFF",
          "off-white":  "#F8FAFC",
          surface:     "#EEF2F7",
          slate:       "#64748B",
          "dark-slate": "#1E293B",
          border:      "#D1DCE8",
          "border-dark": "#1E3A5F",
        }
      },
      fontFamily: {
        sans: ["Inter", "ui-sans-serif", "system-ui", "sans-serif"],
      },
      backgroundImage: {
        "brand-gradient":   "linear-gradient(135deg, #29B6C8 0%, #1565C0 50%, #0D2147 100%)",
        "hero-mesh":        "radial-gradient(ellipse at 20% 50%, rgba(41,182,200,0.15) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(21,101,192,0.15) 0%, transparent 60%)",
        "card-shine":       "linear-gradient(135deg, rgba(122,220,232,0.08) 0%, transparent 60%)",
      },
      boxShadow: {
        "card":    "0 1px 3px 0 rgba(10,22,40,0.08), 0 1px 2px -1px rgba(10,22,40,0.04)",
        "card-md": "0 4px 16px 0 rgba(10,22,40,0.10), 0 2px 4px -1px rgba(10,22,40,0.06)",
        "cyan":    "0 0 24px 0 rgba(41,182,200,0.30)",
      },
      animation: {
        "fade-in": "fadeIn 0.4s ease-out",
        "fade-up": "fadeUp 0.5s ease-out",
      },
      keyframes: {
        fadeIn: {
          "0%":   { opacity: "0" },
          "100%": { opacity: "1" },
        },
        fadeUp: {
          "0%":   { opacity: "0", transform: "translateY(20px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
      },
    },
  },
  plugins: [],
};
