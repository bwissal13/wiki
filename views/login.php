<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="input.css" />
  <link href="./assets/dist/output.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet" />
  <title>Sign in</title>
</head>

<body>
  <!-- component -->
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
  </head>

  <body class="bg-white rounded-lg py-5">
    <div class="container flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
      <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
        <div class="flex items-center justify-center w-full lg:p-12">
          <div class="flex items-center xl:p-10">
            <form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl"  method="post">
              <h3 class="mb-3 text-4xl font-extrabold text-blue-600">Sign In</h3>
              <p class="mb-4 text-grey-700">Enter your email and password</p>

              <div class="flex items-center mb-3">
                <hr class="h-0 border-b border-solid border-grey-500 grow">

              </div>
              <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
              <input id="email" type="email" name="email" placeholder="email@gmail.com" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
              <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
              <input id="password" type="password" name="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />

              <div class="flex flex-row justify-between mb-8">
                <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">

                  <a href="#" class="mr-4 text-sm font-medium text-purple-blue-500">Forget password?</a>
              </div>
              <button class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-blue-800 bg-purple-blue-500">Sign In</button>
              <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="#" class="font-bold text-grey-700">Create an Account</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
  <html>
</body>

</html>