<div class="container">
     <div class="w-72 m-2 p-4 flex flex-col justify-center mx-auto my-36 bg-white rounded-md shadow-md gap-2">
         <h1 class="text-3xl mx-auto text-center mb-4">login</h1>
        <label class="text-red-400 font-sans font-medium" for="username/email">username/email</label>
        <input wire:model="post.loginUsernameOrEmail" class="p-2 rounded-sm border-b-2 focus:outline-0" type="text">

        <label class="text-red-400 font-sans font-medium" for="password">password</label>
        <input wire:model="post.loginPassword" class="p-2 rounded-sm border-b-2 focus:outline-0" type="password">

        <input class="bg-red-400 p-2 mt-6 font-medium rounded-md focus:bg-red-500 focus:text-white" type="submit">

        <a href="/registration" class="mx-auto text-center mt-4 focus:text-red-400">dont have account?</a>
     </div>
</div>


