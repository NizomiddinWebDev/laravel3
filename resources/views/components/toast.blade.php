<!-- component -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<main x-data="app" class="min-w-screen grid min-h-screen place-items-center">
    <button type="button" @click="closeToast()" x-show="open" x-transition.duration.300ms class="fixed right-4 top-4 z-50 rounded-md bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">
        <div class="flex items-center space-x-2">
            <span class="text-3xl"><i class="bx bx-check"></i></span>
            <p class="font-bold">Item Created Successfully!</p>
        </div>
    </button>
</main>

<script>
  let timer;

  document.addEventListener("alpine:init", () => {
      Alpine.data("app", () => ({
          open: true,
          clearTimeout(timer);
          timer = setTimeout(() => {
                  this.open = false;
              }, 5000);
          closeToast() {
              this.open = false;
          },
      }));
  });
</script>
