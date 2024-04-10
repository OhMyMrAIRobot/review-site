/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/views/main/index.blade.php",
      "./resources/views/components/header.blade.php",
      "./resources/views/components/footer.blade.php",
      "./resources/views/components/pagination.blade.php",
      "./resources/views/components/sidebarAdmin.blade.php",
      "./resources/views/components/success.blade.php",
      "./resources/views/components/error.blade.php",
      "./resources/views/main/auth.blade.php",
      "./resources/views/main/register.blade.php",
      "./resources/views/main/forgotPassword.blade.php",
      "./resources/views/main/ResetPassword.blade.php",
      "./resources/views/main/shopPage.blade.php",
      "./resources/views/admin/shops/adminShops.blade.php",
      "./resources/views/admin/shops/addShop.blade.php",
      "./resources/views/admin/feedback/adminFeedback.blade.php",
      "./resources/views/admin/feedback/adminFeedbackReply.blade.php",
      "./resources/views/admin/statistics/index.blade.php",
  ],
  theme: {
      extend: {
          colors: {
              primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
          }
      },
  },
  plugins: [
  ],
}

