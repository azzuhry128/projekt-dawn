<div class="h-screen flex flex-col bg-emerald-200">
@livewire('header')
    <div class="mx-auto flex flex-col my-32">
        <h1 class="text-3xl text-center font-sans font-medium p-2">organize your money with our app, it's free !</h1>
        <h3 class="text-md text-center mx-auto font-sans font-normal mt-2 mb-2 w-72">
            we'll organize your spendings, 
            help make financial planning, 
            and track your savings 
        </h3>

        <form class="flex flex-row items-center justify-center m-4">
            <a href="/registration"  value="sign-up for free" 
            class=
            "mx-auto bg-slate-900 text-slate-100 py-2 px-4 
            font-sans font-medium rounded-full focus:bg-violet-400 focus:text-slate-900"
            >sign-up for free</a>
        </form>

        <div class="mx-auto p-2">
            <h1 class="text-3xl text-center font-medium font-sans">connect with us !</h1>
            <ul class="flex flex-row items-center justify-center gap-4 m-6">
                <li class="text-center"><a href="#" class="text-blue-500 p-2">facebook</a></li>
                <li class="text-center"><a href="#" class="text-pink-500 p-2">instagram</a></li>
                <li class="text-center"><a href="#" class="text-sky-400 p-2">twitter</a></li>
            </ul>
        </div>
    </div>
@livewire('footer')
</div>




