@extends('layouts.app')

@section('title', 'Adimin Users')

@section('content')
    <div class="container-fluid mt-5 px-5">
        <div class="row">
            
            <!-- Include the sidebar here-->
            @include('components.admin-sidebar')

            <div class="col-lg-10">
                <table class="table table-hover align-middle border text-center">
                    <thead>
                        <tr class="admin-table-header">
                            <th></th>
                            <th>Name</th>
                            <th>BirthDate</th>
                            <th>Language</th>
                            <th class="hide-on-mobile">Create</th>
                            <th class="hide-on-mobile">Update</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @csrf

                        @foreach ($all_profiles as $profile)

                        @php
                            $languageMap = [
                                'ko-KR' => 'Korean',
                                'en-US' => 'English',
                                'ja-JP' => 'Japanese',
                                'zh-Hans-CN' => 'Chainese',
                                'de-DE' => 'German',
                                'es-ES' => 'Spanish',
                                'pt-BR' => 'Portuguese',
                                'vi-VN' => 'Vietnamese',
                                'ar-SA' => 'Arabic',
                                'ru-RU' => 'Russian',
                                'it-IT' => 'Italian',
                            ];

                            $languageName = $languageMap[$profile->language] ?? $profile->language;
                        @endphp

                            <tr>
                                <td>
                                    @if ($profile && $profile->avatar)
                                        <img src="{{ $profile->avatar }}" alt="profile-avatar"
                                            class="rounded-circle d-block avatar-md admin-profile-avatar">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-size"></i>
                                    @endif
                                </td>
                                <td>
                                    {{ $profile->first_name }} {{ $profile->last_name }} {{ $profile->middle_name }}
                                </td>
                                <td>{{ $profile->birth_date }}</td>
                                <td>{{ $languageName }}</td>
                                <td class="hide-on-mobile">
                                    {{ $profile->created_at }}
                                </td>
                                <td class="hide-on-mobile">
                                    {{ $profile->updated_at }}
                                </td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal-{{ $profile->user->id }}">
                                    <i class="fa-solid fa-trash-can"></i>                                   
                                    </button>
                                </td>
                            </tr>

                            <!-- Include the modal here-->
                            @include('components.admin-delete-user-modal')

                        @endforeach
                    </tbody>
                </table>
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $all_profiles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

