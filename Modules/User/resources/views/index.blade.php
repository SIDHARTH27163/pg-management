<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenant Dashboard') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto p-1 ">
      
        
        <div class="container relative z-40 mx-auto mt-10  p-5">
          <div class="p-4">
            <div class="flex flex-col lg:flex-row items-center justify-between w-full bg-white p-6 rounded-lg shadow">
                <!-- Stepper -->
                <ol class="lg:flex items-center w-full space-y-4 lg:space-y-0 lg:space-x-4">
                    <li class="relative">
                        <a href="#" class="flex items-center font-medium w-full">
                            <span class="w-6 h-6 bg-indigo-600 border border-transparent rounded-full flex justify-center items-center mr-3 text-sm text-white lg:w-8 lg:h-8">1</span>
                            <div class="block">
                                <h4 class="text-base text-indigo-600">Create Account</h4>
                            </div>
                            <svg class="w-5 h-5 ml-2 stroke-indigo-600 sm:ml-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 18L9.67462 13.0607C10.1478 12.5607 10.3844 12.3107 10.3844 12C10.3844 11.6893 10.1478 11.4393 9.67462 10.9393L5 6M12.6608 18L17.3354 13.0607C17.8086 12.5607 18.0452 12.3107 18.0452 12C18.0452 11.6893 17.8086 11.4393 17.3354 10.9393L12.6608 6" stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="flex items-center font-medium w-full">
                            <span class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm lg:w-8 lg:h-8">2</span>
                            <div class="block">
                                <h4 class="text-base text-gray-900">Billing Information</h4>
                            </div>
                            <svg class="w-5 h-5 ml-2 stroke-gray-900 sm:ml-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 18L9.67462 13.0607C10.1478 12.5607 10.3844 12.3107 10.3844 12C10.3844 11.6893 10.1478 11.4393 9.67462 10.9393L5 6M12.6608 18L17.3354 13.0607C17.8086 12.5607 18.0452 12.3107 18.0452 12C18.0452 11.6893 17.8086 11.4393 17.3354 10.9393L12.6608 6" stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="flex items-center font-medium w-full">
                            <span class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm lg:w-8 lg:h-8">3</span>
                            <div class="block">
                                <h4 class="text-base text-gray-900">Summary</h4>
                            </div>
                        </a>
                    </li>
                </ol>
            
                <!-- Countdown Timer -->
                <div class="ml-8 bg-gray-100 p-4 rounded-lg text-center shadow">
                    <h4 class="text-lg font-semibold text-gray-900">Payment Expires In:</h4>
                    <div id="countdown" class="text-2xl font-bold text-red-600 mt-2"></div>
                </div>
            </div>
          </div>
          <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 dark:bg-gray-950 bg-white p-5">
      
            <a href="{{ route('user.userprofile') }}" class="flex flex-col dark:bg-gray-800 items-center justify-center py-10 text-center rounded-lg shadow-md shadow-gray-200 hover:scale-110 hover:shadow-lg transform transition  duration-500 ease-in-out">
              <div class="block mx-auto">
                <svg class="w-12 h-12 text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                  </svg>
                  
              </div>
              <p class="pt-4 text-sm font-medium capitalize text-gray-600 lg:text-lg md:text-base md:pt-6 hover:border-teal-600 dark:hover:border-teal-700 leading-10">
                Profile
              </p>
            </a>
      
            <a href="{{ route('admin.room-management') }}" class="flex flex-col dark:bg-gray-800 items-center justify-center py-10 text-center rounded-lg shadow-md shadow-gray-200 hover:scale-110 hover:shadow-lg transform transition  duration-500 ease-in-out">
                <div class="block mx-auto">
                    <svg class="w-12 h-12 text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"/>
                      </svg>
                      
                  </div>
              <p class="pt-4 text-sm font-medium capitalize text-gray-600 lg:text-lg md:text-base md:pt-6 hover:border-teal-600 dark:hover:border-teal-700 leading-10">
               Room Queries
              </p>
            </a>
      
            <a href="{{ route('admin.booking-management') }}" class="flex flex-col dark:bg-gray-800 items-center justify-center py-10 text-center rounded-lg shadow-md shadow-gray-200 hover:scale-110 hover:shadow-lg transform transition  duration-500 ease-in-out">
                <div class="block mx-auto">
                    <svg class="w-12 h-12 text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.6 16.733c.234.269.548.456.895.534a1.4 1.4 0 0 0 1.75-.762c.172-.615-.446-1.287-1.242-1.481-.796-.194-1.41-.861-1.241-1.481a1.4 1.4 0 0 1 1.75-.762c.343.077.654.26.888.524m-1.358 4.017v.617m0-5.939v.725M4 15v4m3-6v6M6 8.5 10.5 5 14 7.5 18 4m0 0h-3.5M18 4v3m2 8a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                      </svg>
                      
                  </div>
              <p class="pt-4 text-sm font-medium capitalize text-gray-600 lg:text-lg md:text-base md:pt-6 hover:border-teal-600 dark:hover:border-teal-700 leading-10">
               Make Payment
              </p>
            </a>
      
            <a href="#" class="flex flex-col dark:bg-gray-800 items-center justify-center py-10 text-center rounded-lg shadow-md shadow-gray-200 hover:scale-110 hover:shadow-lg transform transition  duration-500 ease-in-out">
                <div class="block mx-auto">
                    <svg class="h-12 w-12 dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                        
                  </div>
              <p class="pt-4 text-sm font-medium capitalize text-gray-600 lg:text-lg md:text-base md:pt-6 hover:border-teal-600 dark:hover:border-teal-700 leading-10">
                Payment history
              </p>
            </a>
      
            
      
           
      
          </div>
      
        </div>
      </section>
      
</x-app-layout>
