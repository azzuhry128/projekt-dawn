<div class="h-screen w-screen flex flex-col">
      <form wire:submit.prevent x-data="{ open: false }" class="p-4 mx-8 my-24  flex flex-col justify-center bg-white rounded-md shadow-md gap-2">
         <h1 class="text-3xl mx-auto text-center font-sans mb-4">registration</h1>

         <div class="flex flex-col">
            <label class="text-red-400 font-sans font-medium" for="username/email">username</label>
            <input wire:model="registUsername" class="p-2 rounded-sm border-b-2 focus:outline-0" type="text">
         </div>
      
         <div class="flex flex-col">
            <label class="text-red-400 font-sans focus:outline-none font-medium" for="username/email">email address</label>
            <input wire:model="registEmail" class="p-2 rounded-sm border-b-2 focus:outline-0" type="text">
         </div>

         <div class="flex flex-col">
            <label class="text-red-400 font-sans focus:outline-none font-medium" for="password">password</label>
            <input wire:model="registPassword" class="p-2 rounded-sm border-b-2 focus:outline-0" type="password">
         </div>

         <input @click="$wire.registMethod()" class="bg-red-400 p-2 mt-6 font-medium rounded-md focus:bg-red-500 focus:text-white" type="submit">

         <a href="/login" class="mx-auto text-center mt-4 focus:text-red-400 border-b-2">already have an account?</a>
      </form>
</div>
