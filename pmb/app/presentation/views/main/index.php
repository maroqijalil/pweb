<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Portal PMB</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= URL . 'assets/css/tailwind.output.css' ?>" />
  <link rel="stylesheet" href="https://tailwindui.com/css/components-v2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <link rel="stylesheet" href="<?= URL . 'assets/css/app.css' ?>" />

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="<?= URL . 'assets/js/init-alpine.js' ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <div class="flex flex-col flex-1 w-full">

      <header class="flex z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-3 mx-auto text-sp-primary-400 dark:text-sp-primary-400">
          <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-sp-primary" @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="#A4D961" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <div class="flex justify-center flex-1 lg:mr-32">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-sp-primary-400">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="#A4D961" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-sp-primary-100 focus:outline-none focus:shadow-outline-sp-primary form-input" type="text" placeholder="Cari produk" aria-label="Search" />
            </div>
          </div>
          <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative z-10">
              <button class="align-middle rounded-full focus:shadow-outline-sp-primary focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                <img class="object-cover w-8 h-8 rounded-full" src="https://cdn1-production-images-kly.akamaized.net/NpSkxEAUZsogHK1-HG4KlurfdSM=/0x248:2423x1613/640x360/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3412481/original/055674500_1616773504-115383249_m.jpeg" alt="" aria-hidden="true" />
              </button>
              <template x-if="isProfileMenuOpen">
                <ul x-transition:leave="z-10 transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-400 dark:bg-gray-700" aria-label="submenu">
                  <li class="flex mt-2">
                    <form method="POST" action="" class="inline-flex items-center w-full">
                      <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#A4D961">
                          <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                          </path>
                        </svg>
                        <span>Log out</span>
                      </a>
                    </form>
                  </li>
                </ul>
              </template>
            </li>
          </ul>
        </div>
      </header>

      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Data Kategori Produk
          </h2>
          <!-- CTA -->
          <a class="mt-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-sp-primary-50 bg-sp-primary-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="#" id="add-category">
            <div class="flex items-center gap-2">

              <span>Jumlah Kategori</span>
            </div>
            <span class="flex items-center gap-2">
              <p>Tambah Kategori</p>

            </span>
          </a>

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 w-3/4">Nama</th>
                    <th class="px-4 py-3 w-1/4">Aksi</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm cursor-pointer">
                        <div>
                          <p class="font-semibold">Nama</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm flex gap-3">
                      <button class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" id="delete-category" data-id="{{ $category->product_category_id }}">
                        Hapus
                      </button>
                    </td>
                  </tr>

                  <div class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" id="modal-delete-category-{{ $category->product_category_id }}">
                    <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">

                      <header class="flex justify-end">
                        <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" id="modal-close-button" data-id="{{ $category->product_category_id }}">
                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </header>

                      <!-- Modal body -->
                      <div class="mt-4 mb-6">

                        <!-- Modal title -->
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                          Hapus Kategori
                        </p>

                        <!-- Modal description -->
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                          Apakah Anda ingin menghapus kategori {{ $category->nama }}?
                        </p>
                      </div>

                      <footer class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button id="modal-close-button" data-id="{{ $category->product_category_id }}" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                          Batal
                        </button>

                        <form method="POST" action="">
                          <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red m-0">
                            Iya
                          </button>
                        </form>
                      </footer>
                    </div>
                  </div>

                </tbody>
              </table>
            </div>

          </div>
        </div>

        <div class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" id="modal-add-category">
          <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">

            <header class="flex justify-end">
              <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" id="add-category-close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                  <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
              </button>
            </header>

            <!-- Modal body -->
            <div class="mt-4">

              <!-- Modal title -->
              <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                Tambah Kategori
              </p>

              <form method="POST" action="">

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Nama
                  </span>
                  <input class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="nama" placeholder="Kategori Produk" required />
                </label>

                <footer class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-white dark:bg-gray-800 mt-6">
                  <button id="add-category-close" type="button" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Batal
                  </button>

                  <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-100 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-sp-primary-100 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple m-0">
                    Tambah
                  </button>
                </footer>
              </form>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("body").on('click', "#delete-category", function(e) {
        var categoryId = $(this).data(("id"));
        $(`#modal-delete-category-${categoryId}`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#modal-close-button", function(e) {
        var categoryId = $(this).data(("id"));
        $(`#modal-delete-category-${categoryId}`).removeClass('flex').addClass('hidden');
      });

      $("body").on('click', "#add-category", function(e) {
        $(`#modal-add-category`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#add-category-close", function(e) {
        $(`#modal-add-category`).removeClass('flex').addClass('hidden');
      });
    });
  </script>
</body>

</html>
