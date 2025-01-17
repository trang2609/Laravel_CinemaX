@php use Illuminate\Support\Facades\Cookie; @endphp
<!-- Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title text-success" id="loginModalLabel">ĐĂNG NHẬP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/signin">
                    {{--                    @csrf--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="url" value="{{ url()->current() }}"/>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Nhập email..."
                               @if(session()->has('username_web'))
                                   value="{!!session()->get('username_web') !!}"
                               @endif
                               name="username" aria-label="username"
                               autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Nhập mật khẩu..."
                               @if(session()->has('password_web'))
                                   value="{!!session()->get('password_web') !!}"
                               @endif
                               name="password" aria-label="password">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox"
                               @if(session()->has('username_web'))
                                   checked
                               @endif
                               id="rememberme" name="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-success text-uppercase">Đăng nhập</button>
                        <p class="text-dark w-100">Chưa có tài khoản?
                            <a class="link link-success" data-bs-target="#registerModal" data-bs-toggle="modal"
                               href="#registerModal">Đăng ký
                            </a>
                        </p>
                        <a data-bs-target="#forgotModal" data-bs-toggle="modal"
                           href="#forgotModal" class="link link-secondary col-12 mt-4">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true" aria-labelledby="registerModalLabel">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title text-success" id="registerModalLabel">ĐĂNG KÝ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/signUp">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Nhập họ tên..." name="fullName" aria-label="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Nhập Email..." name="email" aria-label="email"
                               autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Nhập mật khẩu..." name="password"
                               aria-label="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Nhập lại mật khẩu..." name="repassword" aria-label="">
                    </div>
                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-success text-uppercase">Đăng ký</button>
                        <p class="text-dark w-100">Đã có tài khoản?
                            <a class="link link-success" data-bs-target="#loginModal" data-bs-toggle="modal" href="#loginModal">Đăng nhập
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Forget Password -->
<div class="modal fade" id="forgotModal" tabindex="-1" aria-hidden="true" aria-labelledby="forgotModalLabel">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title text-success" id="forgotModalLabel">Quên mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/forgot_password">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Nhập email..." name="email" aria-label="">
                    </div>
                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-success text-uppercase">Xác nhận</button>
                        <p class="text-dark w-100">Đã có tài khoản?
                            <a class="link link-success" data-bs-target="#loginModal" data-bs-toggle="modal" href="#loginModal">Đăng nhập
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
