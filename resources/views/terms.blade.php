@extends('layout.layout')

@section('title', 'Terms')

@section('contant')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin
                literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney
                College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage,
                and
                going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum
                comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                by
                Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                Renaissance.
                The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
                1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
                original
                form, accompanied by English versions from the 1914 translation by H. Rackham.

                <h2 class="mt-5"> Additional Terms</h2>
                <p>
                    1. <strong>Acceptance of Terms:</strong> By accessing and using this website, you accept and agree to be
                    bound by the terms and provisions of this agreement. In addition, when using this website's particular
                    services, you shall be subject to any posted guidelines or rules applicable to such services.
                </p>
                <p>
                    2. <strong>Modification of Terms:</strong> We reserve the right to change the terms, conditions, and
                    notices under which the offerings of this website are provided, including but not limited to the charges
                    associated with the use of the website.
                </p>
                <p>
                    3. <strong>Privacy and Data Protection:</strong> We are committed to protecting your privacy. Authorized
                    employees within the company on a need to know basis only use any information collected from individual
                    customers.
                </p>
                <p>
                    4. <strong>License and Site Access:</strong> We grant you a limited license to access and make personal
                    use of this site. This license does not include any resale or commercial use of this site or its
                    contents.
                </p>
                <p>
                    5. <strong>User Account:</strong> If you use this site, you are responsible for maintaining the
                    confidentiality of your account and password and for restricting access to your computer, and you agree
                    to accept responsibility for all activities that occur under your account or password.
                </p>
                <p>
                    6. <strong>Prohibited Activities:</strong> You are prohibited from using the site or its content for any
                    unlawful purpose; to solicit others to perform or participate in any unlawful acts; to violate any
                    international, federal, provincial or state regulations, rules, laws, or local ordinances.
                </p>
                <p>
                    7. <strong>Third-Party Links:</strong> Certain content, products, and services available via our Service
                    may include materials from third parties. Third-party links on this site may direct you to third-party
                    websites that are not affiliated with us.
                </p>
                <p>
                    8. <strong>Termination:</strong> We may terminate or suspend access to our Service immediately, without
                    prior notice or liability, for any reason whatsoever, including without limitation if you breach the
                    Terms.
                </p>
                <p>
                    9. <strong>Governing Law:</strong> These Terms shall be governed and construed in accordance with the
                    laws of our country, without regard to its conflict of law provisions.
                </p>
                <p>
                    10. <strong>Contact Information:</strong> Questions about the Terms of Service should be sent to us at
                    support@yourwebsite.com.
                </p>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
