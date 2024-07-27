@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- prfile -->
        <div class="col-3">
            <i class="fa-solid fa-user text-dark"></i>
                <h4>John Adam Smitd</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <h6>Language ：　English</h6>
            <div class="mb-3 col-8 mx-auto">
                <button type="submit" class="btn bg-kurenai btn-lg text-white px-5">Edit</button>
            </div>
        </div>
        <!-- Posts-->
        <div class="col-lg-9 mx-auto p-0 d-flex justify-content-center>
            <div class="row">
                
                <div class="row">
                    <div class="section-header">
                        <h2>My post</h2>
                        <hr class="profiles-hr">
                    </div>

                        <div class="profiles-gallery">
                            <table class="profiles-items">
                                    <tr>
                                        <td>
                                            <img 
                                            src="https://images.pexels.com/photos/259772/pexels-photo-259772.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt=""
                                            class="profiles-img">
                                            <h3>Title flower garden</h3>
                                            <p>review</p>
                                            <p>User name</p>
                                        </td>
                                        <td>
                                            <img 
                                            src="https://images.pexels.com/photos/1876568/pexels-photo-1876568.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt=""
                                            class="profiles-img">
                                            <h3>Title flower garden</h3>
                                            <p>review</p>
                                            <p>User name</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img 
                                            src="https://images.pexels.com/photos/932261/pexels-photo-932261.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt=""
                                            class="profiles-img">
                                            <h3>Title flower garden</h3>
                                            <p>review</p>
                                            <p>User name</p>
                                        </td>
                                        <td>
                                            <img 
                                            src="https://images.pexels.com/photos/161251/senso-ji-temple-japan-kyoto-landmark-161251.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt=""
                                            class="profiles-items">
                                            <h3>Title flower garden</h3>
                                            <p>review</p>
                                            <p>User name</p>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection