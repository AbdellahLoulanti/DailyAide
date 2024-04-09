
<x-layout>
    @include('partials._search');
    <a href="/demande" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
      <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
        @if($listings->count() > 0)
        @foreach($listings as $listing)
    
       <x-listing-card  :listing="$listing">  </x-listing-card>
       
        @endforeach
    
        @else
        <p>No listings found</p>
        @endif
    
        
      </div>
      <div class="mt-6 mx-10">
        {{$listings->links()}}
      </div>
    
    </x-layout>
         