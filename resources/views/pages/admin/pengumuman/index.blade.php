@extends('layout.master')
@section('title')
  Data Pengumuman
@endsection
@section('breadcrumb')
  Data Pengumuman
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Pengumuman
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="{{ route('pengumuman.create') }}">
        <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Data</button>
      </a>
    </div>
  </div>
  {{-- Jenis 1 --}}
  <div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Pengumuman -->
    @foreach ($data as $pengumuman)
      <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
        <div class="flex items-center border-b border-gray-200 px-5 py-4">
          <div class="w-10 h-10 flex-none image-fit">
            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
              src="{{ asset('template/dist/images/preview-11.jpg') }}">
          </div>
          <div class="ml-3 mr-auto">
            <a href="" class="font-medium">Administrator</a>
            <div class="flex text-gray-600 truncate text-xs mt-1">
              <span class="mx-1">•</span> {{ $pengumuman->tgl_pengumuman }}
            </div>
          </div>
          <div class="ml-3">
            <a class="button bg-theme-1 text-white" href="{{ route('pengumuman.edit', $pengumuman->id) }}">
              Edit</a>
          </div>
        </div>
        <div class="p-5">
          <a href="" class="block font-medium text-base mt-5">{{ $pengumuman->judul_pengumuman }}</a>
          <div class="text-gray-700">{{ $pengumuman->loker->nama }}</div>
          <div class="text-gray-500 mt-3">
            {{ Str::limit($pengumuman->ket_pengumuman, 100) }}
          </div>
          <div class="mt-5">
            <a class="button bg-theme-1 text-white" href="{{ route('pengumuman.show', $pengumuman->id) }}">
              Read More</a>
          </div>
        </div>
      </div>
    @endforeach
    <!-- END: Pengumuman -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
      {{ $data->links('vendor.pagination.tailwind') }}
    </div>
    <!-- END: Pagination -->
  </div>

  {{-- Jenis 2 --}}
  {{-- <div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Blog Layout -->
    @foreach (array_slice($fakers, 0, 6) as $pengumuman)
      <div class="intro-y blog col-span-12 md:col-span-6 box">
        <div class="blog__preview image-fit">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-t-md"
            src="{{ asset('dist/images/' . $faker['images'][0]) }}">
          <div class="absolute w-full flex items-center px-5 pt-6 z-10">
            <div class="w-10 h-10 flex-none image-fit">
              <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
                src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
            </div>
            <div class="ml-3 text-white mr-auto">
              <a href="" class="font-medium">{{ $faker['users'][0]['name'] }}</a>
              <div class="text-xs">{{ $faker['formatted_times'][0] }}</div>
            </div>
            <div class="dropdown relative ml-3">
              <a href="javascript:;"
                class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full">
                <i data-feather="more-vertical" class="w-4 h-4 text-white"></i>
              </a>
              <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                  <a href=""
                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                    <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit Post
                  </a>
                  <a href=""
                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                    <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
            <span class="blog__category px-2 py-1 rounded">{{ $faker['products'][0]['category'] }}</span>
            <a href="" class="block font-medium text-xl mt-3">{{ $faker['news'][0]['title'] }}</a>
          </div>
        </div>
        <div class="p-5 text-gray-700">{{ $faker['news'][0]['short_content'] }}</div>
        <div class="flex items-center px-5 py-3 border-t border-gray-200">
          <a href=""
            class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-gray-500 text-gray-600 mr-2 tooltip"
            title="Bookmark">
            <i data-feather="bookmark" class="w-3 h-3"></i>
          </a>
          <div class="intro-x flex mr-2">
            <div class="intro-x w-8 h-8 image-fit">
              <img alt="Midone Laravel Admin Dashboard Starter Kit"
                class="rounded-full border border-white zoom-in tooltip"
                src="{{ asset('dist/images/' . $faker['photos'][0]) }}" title="{{ $faker['users'][0]['name'] }}">
            </div>
            <div class="intro-x w-8 h-8 image-fit -ml-4">
              <img alt="Midone Laravel Admin Dashboard Starter Kit"
                class="rounded-full border border-white zoom-in tooltip"
                src="{{ asset('dist/images/' . $faker['photos'][1]) }}" title="{{ $faker['users'][1]['name'] }}">
            </div>
            <div class="intro-x w-8 h-8 image-fit -ml-4">
              <img alt="Midone Laravel Admin Dashboard Starter Kit"
                class="rounded-full border border-white zoom-in tooltip"
                src="{{ asset('dist/images/' . $faker['photos'][2]) }}" title="{{ $faker['users'][2]['name'] }}">
            </div>
          </div>
          <a href=""
            class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip"
            title="Share">
            <i data-feather="share-2" class="w-3 h-3"></i>
          </a>
          <a href=""
            class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip"
            title="Download PDF">
            <i data-feather="share" class="w-3 h-3"></i>
          </a>
        </div>
        <div class="px-5 pt-3 pb-5 border-t border-gray-200">
          <div class="w-full flex text-gray-600 text-xs sm:text-sm">
            <div class="mr-2">
              Comments: <span class="font-medium">{{ $faker['totals'][0] }}</span>
            </div>
            <div class="mr-2">
              Views: <span class="font-medium">{{ $faker['totals'][1] }}k</span>
            </div>
            <div class="ml-auto">
              Likes: <span class="font-medium">{{ $faker['totals'][2] }}k</span>
            </div>
          </div>
          <div class="w-full flex items-center mt-3">
            <div class="w-8 h-8 flex-none image-fit mr-3">
              <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
                src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
            </div>
            <div class="flex-1 relative text-gray-700">
              <input type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13"
                placeholder="Post a comment...">
              <i data-feather="smile" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <!-- END: Blog Layout -->
    <!-- BEGIN: Pagiantion -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
      <ul class="pagination">
        <li>
          <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevrons-left"></i>
          </a>
        </li>
        <li>
          <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevron-left"></i>
          </a>
        </li>
        <li>
          <a class="pagination__link" href="">...</a>
        </li>
        <li>
          <a class="pagination__link" href="">1</a>
        </li>
        <li>
          <a class="pagination__link pagination__link--active" href="">2</a>
        </li>
        <li>
          <a class="pagination__link" href="">3</a>
        </li>
        <li>
          <a class="pagination__link" href="">...</a>
        </li>
        <li>
          <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevron-right"></i>
          </a>
        </li>
        <li>
          <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevrons-right"></i>
          </a>
        </li>
      </ul>
      <select class="w-20 input box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
      </select>
    </div>
    <!-- END: Pagiantion -->
  </div> --}}

  {{-- Jenis 3 --}}
  {{-- <div class="intro-y news p-5 box mt-8">
    <!-- BEGIN: Blog Layout -->
    <h2 class="intro-y font-medium text-xl sm:text-2xl">{{ $fakers[0]['news'][0]['title'] }}</h2>
    <div class="intro-y text-gray-700 mt-3 text-xs sm:text-sm">
      {{ $fakers[0]['dates'][0] }} <span class="mx-1">•</span> <a class="text-theme-1"
        href="">{{ $fakers[0]['products'][0]['category'] }}</a> <span class="mx-1">•</span> 7 Min read
    </div>
    <div class="intro-y mt-6">
      <div class="news__preview image-fit">
        <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-md"
          src="{{ asset('dist/images/' . $fakers[0]['images'][0]) }}">
      </div>
    </div>
    <div class="intro-y flex relative pt-16 sm:pt-6 items-center pb-6">
      <a href=""
        class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full border border-gray-500 text-gray-600 mr-3 tooltip"
        title="Bookmark">
        <i data-feather="bookmark" class="w-3 h-3"></i>
      </a>
      <div class="intro-x flex mr-3">
        <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full border border-white zoom-in tooltip"
            src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}"
            title="{{ $fakers[0]['users'][0]['name'] }}">
        </div>
        <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit -ml-4">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full border border-white zoom-in tooltip"
            src="{{ asset('dist/images/' . $fakers[0]['photos'][1]) }}"
            title="{{ $fakers[0]['users'][1]['name'] }}">
        </div>
        <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit -ml-4">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full border border-white zoom-in tooltip"
            src="{{ asset('dist/images/' . $fakers[0]['photos'][2]) }}"
            title="{{ $fakers[0]['users'][2]['name'] }}">
        </div>
      </div>
      <div class="absolute sm:relative -mt-12 sm:mt-0 w-full flex text-gray-700 text-xs sm:text-sm">
        <div class="intro-x mr-1 sm:mr-3">
          Comments: <span class="font-medium">{{ $fakers[0]['totals'][0] }}</span>
        </div>
        <div class="intro-x mr-1 sm:mr-3">
          Views: <span class="font-medium">{{ $fakers[0]['totals'][1] }}k</span>
        </div>
        <div class="intro-x sm:mr-3 ml-auto">
          Likes: <span class="font-medium">{{ $fakers[0]['totals'][2] }}k</span>
        </div>
      </div>
      <a href=""
        class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto sm:ml-0 tooltip"
        title="Share">
        <i data-feather="share-2" class="w-3 h-3"></i>
      </a>
      <a href=""
        class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-theme-1 text-white ml-3 tooltip"
        title="Download PDF">
        <i data-feather="share" class="w-3 h-3"></i>
      </a>
    </div>
    <div class="intro-y text-justify leading-relaxed">
      <p class="mb-5">{{ $fakers[1]['news'][0]['content'] }}</p>
      <p class="mb-5">{{ $fakers[2]['news'][0]['content'] }}</p>
      <p>{{ $fakers[3]['news'][0]['content'] }}</p>
    </div>
    <div class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-gray-200">
      <div class="flex items-center">
        <div class="w-12 h-12 flex-none image-fit">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
            src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
        </div>
        <div class="ml-3 mr-auto">
          <a href="" class="font-medium">{{ $fakers[0]['users'][0]['name'] }}</a>, Author
          <div class="text-gray-600">Senior Frontend Engineer</div>
        </div>
      </div>
      <div class="flex items-center text-gray-700 sm:ml-auto mt-5 sm:mt-0">
        Share this post:
        <a href=""
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip"
          title="Facebook">
          <i class="w-3 h-3 fill-current" data-feather="facebook"></i>
        </a>
        <a href=""
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip"
          title="Twitter">
          <i class="w-3 h-3 fill-current" data-feather="twitter"></i>
        </a>
        <a href=""
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip"
          title="Linked In">
          <i class="w-3 h-3 fill-current" data-feather="linkedin"></i>
        </a>
      </div>
    </div>
    <!-- END: Blog Layout -->
    <!-- BEGIN: Comments -->
    <div class="intro-y mt-5 pt-5 border-t border-gray-200">
      <div class="text-base sm:text-lg font-medium">2 Responses</div>
      <div class="news__input relative mt-5">
        <i data-feather="message-circle" class="w-5 h-5 absolute my-auto inset-y-0 ml-6 left-0 text-gray-600"></i>
        <textarea class="input w-full bg-gray-200 pl-16 py-6 placeholder-theme-13 resize-none" rows="1"
          placeholder="Post a comment..."></textarea>
      </div>
    </div>
    <div class="intro-y mt-5 pb-10">
      <div class="pt-5">
        <div class="flex">
          <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
              src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
          </div>
          <div class="ml-3 flex-1">
            <div class="flex items-center">
              <a href="" class="font-medium">{{ $fakers[0]['users'][0]['name'] }}</a>
              <a href="" class="ml-auto text-xs text-gray-600">Reply</a>
            </div>
            <div class="text-gray-600 text-xs sm:text-sm">{{ $fakers[0]['formatted_times'][0] }}</div>
            <div class="mt-2">{{ $fakers[0]['news'][0]['short_content'] }}</div>
          </div>
        </div>
      </div>
      <div class="mt-5 pt-5 border-t border-gray-200">
        <div class="flex">
          <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
              src="{{ asset('dist/images/' . $fakers[0]['photos'][1]) }}">
          </div>
          <div class="ml-3 flex-1">
            <div class="flex items-center">
              <a href="" class="font-medium">{{ $fakers[0]['users'][1]['name'] }}</a>
              <a href="" class="ml-auto text-xs text-gray-600">Reply</a>
            </div>
            <div class="text-gray-600 text-xs sm:text-sm">{{ $fakers[1]['formatted_times'][0] }}</div>
            <div class="mt-2">{{ $fakers[1]['news'][0]['short_content'] }}</div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Comments -->
  </div> --}}
@endsection
