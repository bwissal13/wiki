<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="input.css" />
    <link href="./assets/dist/output.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap"
      rel="stylesheet"
    />
    <title>Wiki™</title>
  </head>
  <body>
    <nav style="background-color: #0b0e15">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button
              type="button"
              class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
              aria-controls="mobile-menu"
              aria-expanded="false"
            >
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
              <svg
                class="block h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
              </svg>
              <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
              <svg
                class="hidden h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div
            class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
          >
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <!-- <a href="http://localhost:8000/login" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Sign in</a> -->
              </div>
            </div>
          </div>
          <?php
// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Set the URL for the login and logout actions
$loginUrl = 'http://localhost:8000/login';
$logoutUrl = 'http://localhost:8000/logout';

// Set the text and URL based on the user's login status
$buttonText = $isLoggedIn ? 'Logout' : 'Sign in';
$buttonUrl = $isLoggedIn ? $logoutUrl : $loginUrl;
?>
<div class="flex space-x-4">
    <a href="<?php echo $buttonUrl; ?>" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">
        <?php echo $buttonText; ?>
    </a>
</div>

          <div
            class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
          >
            <button
              type="button"
              class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
            >
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button
                  type="button"
                  class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                  id="user-menu-button"
                  aria-expanded="false"
                  aria-haspopup="true"
                >
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img
                    class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt=""
                  />
                </button>
              </div>

              <!--             
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
              <!-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"> -->
              <!-- Active: "bg-gray-100", Not Active: "" -->
             <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a> -->
              <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>  -->
            </div> 
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a
            href="#"
            class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
            aria-current="page"
            >Dashboard</a
          >
        </div>
      </div>
    </nav>
    
    <?php if(isset($_SESSION['user_name'])): ?>
    <h1 style="font-family: 'Rhodium Libre', serif; color: #000000" class="text-xl">
        Welcome <?php echo $_SESSION['user_name']; ?>
    </h1>
<?php endif; ?>

    <section
      style="
        height: 95vh;
        display: flex;
        justify-content: center;
        align-items: center;
      "
    >
      <div class="">
        <span
          style="font-family: 'Rhodium Libre', serif; color: #000000"
          class="text-8xl"
          >Wiki <span class="text-blue-600">™</span></span
        >
        <form >
          <label
            for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Search</label
          >
          <div class="relative">
            <div
              class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
            >
              <svg
                class="w-4 h-4 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 20 20"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                />
              </svg>
            </div>
            <input
              type="search"
              id="default-search"
              class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search Mockups, Logos..."
              required
            />
            <button
              type="submit"
              class="text-white absolute end-2.5 bottom-2.5 bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Search
            </button>
          </div>
        </form>
      </div>
    </section>
    <section class="ml-6">

<h2 class="text-xl font-bold m-5 text-center ">last updated</h2>

<?php
// Assuming $rows is an array of items fetched from the database

// Sort $rows array based on the 'id' field in descending order
usort($rows, function ($a, $b) {
    return $b['Id'] <=> $a['Id'];
});

// Get the first item in the sorted array (which is now the one with the largest id)
$latestItem = reset($rows);

// Find the user with the corresponding userId
$latestUser = array_filter($users, function ($u) use ($latestItem) {
    return $u['Id'] == $latestItem['userId'];
});

// Find the category with the corresponding categoryId
$latestCategory = array_filter($categories, function ($c) use ($latestItem) {
    return $c['id'] == $latestItem['categoryId'];
});

// Check if user and category are found
if (!empty($latestUser) && !empty($latestCategory)) {
    $latestUser = reset($latestUser);
    $latestCategory = reset($latestCategory);
?>
    <div class="flex flex-col items-center">
        <div class="flex flex-col w-60 mb-8 mt-8 border border-gray-400 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4" style="width: 60vw;">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2"><?php echo $latestItem['title'] ?></div>
                <p class="text-black text-base"><?php echo $latestItem['description'] ?></p>
            </div>
            <div class="flex items-center">
                <div class="text-sm">
                    <p class="text-black leading-none">Added by: <?php echo $latestUser['name'] ?></p>
                    <p class="text-black leading-none"> <?php echo $latestCategory['name'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


 
      
    </section>
    <section >
      <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 "
      >
   <!-- Assuming this is part of your HTML/PHP file -->
<div id="categoryContainer">
    <ul class="flex flex-wrap -mb-px justify-center">
        <?php foreach ($categories as $category): ?>
            <li class="me-2">
                <a href="#" data-category-id="<?php echo $category['id']; ?>"
                   class="category-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                ><?php echo $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div id="contentContainer">
        <?php
        $counter = 0;
        foreach ($rows as $row):
            // Assuming $selectedCategoryId is set based on the initial selected category
            $selectedCategoryId = 1;

            // Check if the row belongs to the initially selected category
            if ($counter < 3 && $row['categoryId'] == $selectedCategoryId):
                $user = array_filter($users, function ($u) use ($row) {
                    return $u['Id'] == $row['userId'];
                });

                $category = array_filter($categories, function ($c) use ($row) {
                    return $c['id'] == $row['categoryId'];
                });

                if (!empty($user) && !empty($category)):
                    $user = reset($user);
                    $category = reset($category);
        ?>
                    <div class="flex flex-col items-center">
                        <div class="flex flex-col w-60 mb-8 mt-8 border border-gray-400 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4" style="width: 60vw;">
                            <div class="mb-8">
                                <div class="text-black font-bold text-xl mb-2"><?php echo $row['title'] ?></div>
                                <p class="text-black text-base"><?php echo $row['description'] ?></p>
                            </div>
                            <div class="flex ">
                                <div class="text-sm">
                                    <p class="text-black leading-none">Added by: <?php echo $user['name'] ?></p>
                                    <p class="text-black leading-none"><?php echo $category['name'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                endif;
            endif;

            $counter++;
        endforeach;
        ?>
    </div>
</div>

     
    </section>
    

<footer class="bg-black">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
      <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="../public/assets/Wiki™.png" class="h-8 me-3" alt="FlowBite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                    </li>
                    <li>
                        <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                    </li>
                    <li>
                        <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                      <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                  </svg>
                <span class="sr-only">Facebook page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                      <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                  </svg>
                <span class="sr-only">Discord community</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                  <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
              </svg>
                <span class="sr-only">Twitter page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                </svg>
                <span class="sr-only">GitHub account</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
              </svg>
                <span class="sr-only">Dribbble account</span>
            </a>
        </div>
    </div>
  </div>
</footer>

  </body>
  <script>
        //  function search() {
        //     let search_inp = document.getElementById("search_inp");
        //     let cards = document.getElementById("cards");
        //     $.ajax({
        //        method: "POST",
        //        url: "/search_Wiki",
        //        data: {
        //           keyword: search_inp.value,
        //        },
        //        // dataType: "json",

        //        success: function(response) {
        //           //   console.log("the response is :", response);
        //           cards.innerHTML = response;
        //        },
        //        error: function() {
        //           alert("no Wiki found");
        //        },
        //     });
        //  }

        //  function searchCateg(e) {
        //     let category = e.target.textContent;

        //     let cards = document.getElementById("cards");
        //     $.ajax({
        //        method: "POST",
        //        url: "/search_tags",
        //        data: {
        //           keyword: category == 'All' ? '' : category,
        //        },
        //        // dataType: "json",

        //        success: function(response) {
        //           //   console.log("the response is :", response);
        //           cards.innerHTML = response;
        //        },
        //        error: function() {
        //           alert("no user found");
        //        },
        //     });
        //  }

         search();
      </script>
  <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
  <script src="../public/flowbite/dist/flowbite.min.js"></script>
<!-- Add this JavaScript code in your HTML file -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var categoryLinks = document.querySelectorAll('.category-link');
        var contentContainer = document.getElementById('contentContainer');

        categoryLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Get the selected category id from the data attribute
                var selectedCategoryId = this.getAttribute('data-category-id');

                // Update the content based on the selected category
                updateContent(selectedCategoryId);
            });
        });

        function updateContent(selectedCategoryId) {
            // Fetch and update content based on the selected category using AJAX or other methods
            // For simplicity, we'll assume the content is pre-loaded in the PHP code
            contentContainer.innerHTML = '';

            <?php
            $counter = 0;
            foreach ($rows as $row):
                // Check if the row belongs to the selected category
                ?>
                if (<?php echo $counter; ?> < 3 && <?php echo $row['categoryId']; ?> == selectedCategoryId) {
                    var user = <?php echo json_encode(array_values(array_filter($users, function ($u) use ($row) { return $u['Id'] == $row['userId']; }))); ?>;
                    var category = <?php echo json_encode(array_values(array_filter($categories, function ($c) use ($row) { return $c['id'] == $row['categoryId']; }))); ?>;

                    if (user.length > 0 && category.length > 0) {
                        user = user[0];
                        category = category[0];

                        var content = `
                            <div class="flex flex-col items-center">
                                <div class="flex flex-col w-60 mb-8 mt-8 border border-gray-400 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4" style="width: 60vw;">
                                    <div class="mb-8">
                                        <div class="text-black font-bold text-xl mb-2"><?php echo $row['title']; ?></div>
                                        <p class="text-black text-base"><?php echo $row['description']; ?></p>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <p class="text-black leading-none">User: ${user.name}</p>
                                            <p class="text-black leading-none">Category: ${category.name}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        contentContainer.innerHTML += content;
                    }
                }
                <?php
                $counter++;
            endforeach;
            ?>
        }
    });
</script>

  C:\laragon\www\wiki\node_modules\flowbite\dist\flowbite.min.js
</html>
