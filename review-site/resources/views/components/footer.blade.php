<footer class="bg-gray-800 mt-auto">
    <div class="lg:grid lg:grid-cols-12 gap-8 px-4 lg:px-20 py-4">
        <!--COLUMN WITH INFO-->
        <div class = "col-span-5 text-white">
            <h3 class="font-bold text-3xl pb-2">My title</h3>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident.</p>
            <div class="flex flex-col pb-3">
                <span><i class = "fas fa-phone"></i>&nbsp; 123-456-789</span>
                <span><i class = "fas fa-envelope"></i>&nbsp; my_title@gmail.com</span>
            </div>

            <div class="text-3xl flex gap-3">
                <a href = "#" class=" rounded text-center"><i class = "fab fa-facebook"></i></a>
                <a href = "#"><i class = "fab fa-instagram"></i></a>
                <a href = "#"><i class = "fab fa-telegram"></i></a>
                <a href = "#"><i class = "fab fa-vk"></i></a>
            </div>
        </div>

        <!--COLUMN WITH QUICK LINKS-->
        <div class = "col-span-3 lg:mt-0 mt-5">
            <h3 class = "font-bold text-white text-3xl pb-2">Quick links</h3>
            <ul class="transition-all ml-2 flex flex-col gap-1">
                <li class="text-white text-xl hover:ml-3 transition-all duration-300">
                    <a href="{{route('track.link', ['url' => urlencode("https://vk.com/")])}}">Track link</a>
                </li>
                <li class="text-white text-xl hover:ml-3 transition-all duration-300">
                    <a href="#">Quick_link_2</a>
                </li>
                <li class="text-white text-xl hover:ml-3 transition-all duration-300">
                    <a href="#">Quick_link_3</a>
                </li>
                <li class="text-white text-xl hover:ml-3 transition-all duration-300">
                    <a href="#">Quick_link_4</a>
                </li>
                <li class="text-white text-xl hover:ml-3 transition-all duration-300">
                    <a href="#">Quick_link_5</a>
                </li>
            </ul>
        </div>

        <!--COLUMN WITH FEEDBACK-->
        <div class = "col-span-4 lg:mt-0 mt-5">
            <h3 class = "text-white font-bold text-3xl pb-2">Feedback</h3>
            <form class="flex flex-col gap-3" method="POST" action="{{route('feedback.store')}}">
                @csrf
                <label>
                    <input class="lg:w-full sm:w-1/2 w-full text-white px-3 py-2 rounded bg-gray-600 outline-gray-900" type = "email" name = "email" placeholder = "Example@email.com">
                </label>

                <label>
                    <textarea class = "lg:w-full sm:w-1/2 w-full text-white resize-none px-3 py-2 rounded bg-gray-600 outline-gray-900" rows="4" name = "description" placeholder = "Your text..."></textarea>
                </label>
                <button type="submit" class="text-gray-600 lg:w-3/5 sm:w-1/2 w-full text-center text-xl border border-1 border-gray-700 h-12 rounded hover:text-gray-300  transition-all duration-500">
                    <i class = "fa fa-envelope"></i>
                    Отправить
                </button>
            </form>
        </div>
    </div>

    <div class = "bg-gray-900 text-white font-bold text-1xl text-center px-2.5 py-2.5">
        &copy; BSUIR | 2024
    </div>

</footer>
