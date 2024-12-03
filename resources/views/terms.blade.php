@extends('layout.layout')

@section('title', 'Terms')

@section('contant')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            <h4>Terms</h4>
            <div>
                <p>
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>

                <h4>Additional Terms</h4>

                <ul class="terms-list">
                    <li>Acceptance of Terms:
                        <p class="fs-6 fw-light text-muted mb-0">By accessing and using this website, you accept and agree to be bound by the terms and provisions of this agreement. In addition, when using this website's particular services, you shall be subject to any posted guidelines or rules applicable to such services.</p>
                    </li>
                    <li>Modification of Terms:
                        <p class="fs-6 fw-light text-muted mb-0">We reserve the right to change the terms, conditions, and notices under which the offerings of this website are provided, including but not limited to the charges associated with the use of the website.</p>
                    </li>
                    <li>License and Site Access:
                        <p class="fs-6 fw-light text-muted mb-0"> We grant you a limited license to access and make personal use of this site. This license does not include any resale or commercial use of this site or its contents.</p>
                    </li>
                    <li>Privacy and Data Protection:
                        <p class="fs-6 fw-light text-muted mb-0">We are committed to protecting your privacy. Authorized employees within the company on a need-to-know basis only use any information collected from individual customers.</p>
                    </li>
                    <li>User Account:
                        <p class="fs-6 fw-light text-muted mb-0">If you use this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password.</p>
                    </li>
                    <li>Prohibited Activities:
                        <p class="fs-6 fw-light text-muted mb-0">You are prohibited from using the site or its content for any unlawful purpose.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-3">
            @include('shared.top_users')
        </div>
    </div>
@endsection
