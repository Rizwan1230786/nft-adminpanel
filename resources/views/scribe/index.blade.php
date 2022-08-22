<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Allset</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.24.1.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.24.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-seller-change-password">
                        <a href="#endpoints-POSTapi-seller-change-password">POST api/seller/change-password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-payment-history">
                        <a href="#endpoints-GETapi-payment-history">GET api/payment-history</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-customer-customer-login">
                        <a href="#endpoints-POSTapi-customer-customer-login">Customer Login</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-customer-send-otp-code">
                        <a href="#endpoints-POSTapi-customer-send-otp-code">Send OTP Code</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-customer-get-link-detail">
                        <a href="#endpoints-POSTapi-customer-get-link-detail">Get Link Detail</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-customer-customer_order">
                        <a href="#endpoints-POSTapi-customer-customer_order">POST api/customer/customer_order</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-migrate">
                        <a href="#endpoints-GETapi-migrate">GET api/migrate</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="seller-links">
                    <a href="#seller-links">Seller Links</a>
                </li>
                                    <ul id="tocify-subheader-seller-links" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="seller-links-POSTapi-seller-create-link">
                        <a href="#seller-links-POSTapi-seller-create-link">Create or Update Seller Links</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-links-GETapi-seller-get-links-list">
                        <a href="#seller-links-GETapi-seller-get-links-list">Get Seller Links List</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-links-POSTapi-seller-attach-product-with-links">
                        <a href="#seller-links-POSTapi-seller-attach-product-with-links">Attach Product With Links</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-links-POSTapi-seller-delete-service-from-link">
                        <a href="#seller-links-POSTapi-seller-delete-service-from-link">Delete Services From Link</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-links-POSTapi-seller-delete-seller-link">
                        <a href="#seller-links-POSTapi-seller-delete-seller-link">Delete Seller Link</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="barber-profile-app">
                    <a href="#barber-profile-app">Barber profile app</a>
                </li>
                                    <ul id="tocify-subheader-barber-profile-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="barber-profile-app-POSTapi-seller-social-link">
                        <a href="#barber-profile-app-POSTapi-seller-social-link">POST api/seller/social-link</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="barber-profile-app-GETapi-seller-profile-show">
                        <a href="#barber-profile-app-GETapi-seller-profile-show">GET api/seller/profile-show</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="barber-profile-app-GETapi-seller-get-profile-data">
                        <a href="#barber-profile-app-GETapi-seller-get-profile-data">GET api/seller/get-profile-data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="barber-profile-app-POSTapi-seller-update_profile_data">
                        <a href="#barber-profile-app-POSTapi-seller-update_profile_data">POST api/seller/update_profile_data</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="customer-app">
                    <a href="#customer-app">Customer app</a>
                </li>
                                    <ul id="tocify-subheader-customer-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="customer-app-GETapi-customer-profile">
                        <a href="#customer-app-GETapi-customer-profile">GET api/customer/profile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="customer-app-POSTapi-customer-profile-update">
                        <a href="#customer-app-POSTapi-customer-profile-update">POST api/customer/profile/update</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="nfc-request-app">
                    <a href="#nfc-request-app">NFC request app</a>
                </li>
                                    <ul id="tocify-subheader-nfc-request-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="nfc-request-app-POSTapi-nfcrequest">
                        <a href="#nfc-request-app-POSTapi-nfcrequest">POST api/nfcrequest</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="seller-guest-app">
                    <a href="#seller-guest-app">Seller Guest app</a>
                </li>
                                    <ul id="tocify-subheader-seller-guest-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="seller-guest-app-POSTapi-seller-register">
                        <a href="#seller-guest-app-POSTapi-seller-register">Register the Seller</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-guest-app-POSTapi-seller-login">
                        <a href="#seller-guest-app-POSTapi-seller-login">Login the Seller</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="seller-profile-app">
                    <a href="#seller-profile-app">Seller Profile app</a>
                </li>
                                    <ul id="tocify-subheader-seller-profile-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="seller-profile-app-POSTapi-seller-update-basic-detail">
                        <a href="#seller-profile-app-POSTapi-seller-update-basic-detail">Basic Detail Update</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-profile-app-POSTapi-seller-update-seller-profile">
                        <a href="#seller-profile-app-POSTapi-seller-update-seller-profile">Update Seller Image</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-profile-app-GETapi-seller-check-stripe-status">
                        <a href="#seller-profile-app-GETapi-seller-check-stripe-status">Check Seller Stripe Status</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="seller-profile-app-POSTapi-get_path">
                        <a href="#seller-profile-app-POSTapi-get_path">POST api/get_path</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
                <li class="tocify-item level-1" data-unique="services-app">
                    <a href="#services-app">Services app</a>
                </li>
                                    <ul id="tocify-subheader-services-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="services-app-GETapi-seller-get-all-services">
                        <a href="#services-app-GETapi-seller-get-all-services">Listing Of Services</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="services-app-POSTapi-seller-add-service">
                        <a href="#services-app-POSTapi-seller-add-service">Add OR Update The Services</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="services-app-DELETEapi-seller-delete-service--id-">
                        <a href="#services-app-DELETEapi-seller-delete-service--id-">Delete Of Services</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-10" class="tocify-header">
                <li class="tocify-item level-1" data-unique="webpages-app">
                    <a href="#webpages-app">Webpages app</a>
                </li>
                                    <ul id="tocify-subheader-webpages-app" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="webpages-app-GETapi-webpages_show">
                        <a href="#webpages-app-GETapi-webpages_show">GET api/webpages_show</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 16 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Barber app</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://allset.itsumar.com</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-POSTapi-seller-change-password">POST api/seller/change-password</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-change-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/change-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"old_password\": \"et\",
    \"new_password\": \"iure\",
    \"confirm_password\": \"sapiente\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/change-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "et",
    "new_password": "iure",
    "confirm_password": "sapiente"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-change-password">
</span>
<span id="execution-results-POSTapi-seller-change-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-change-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-change-password"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-change-password"></code></pre>
</span>
<form id="form-POSTapi-seller-change-password" data-method="POST"
      data-path="api/seller/change-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-change-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-change-password"
                    onclick="tryItOut('POSTapi-seller-change-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-change-password"
                    onclick="cancelTryOut('POSTapi-seller-change-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-change-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/change-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>old_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="old_password"
               data-endpoint="POSTapi-seller-change-password"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>new_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="new_password"
               data-endpoint="POSTapi-seller-change-password"
               value="iure"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>confirm_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="confirm_password"
               data-endpoint="POSTapi-seller-change-password"
               value="sapiente"
               data-component="body" hidden>
    <br>
<p>validation.same.</p>
        </p>
        </form>

            <h2 id="endpoints-GETapi-payment-history">GET api/payment-history</h2>

<p>
</p>



<span id="example-requests-GETapi-payment-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/payment-history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/payment-history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-payment-history">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;object&quot;: &quot;list&quot;,
    &quot;data&quot;: [],
    &quot;has_more&quot;: false,
    &quot;url&quot;: &quot;/v1/issuing/transactions&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-payment-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payment-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payment-history"></code></pre>
</span>
<span id="execution-error-GETapi-payment-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payment-history"></code></pre>
</span>
<form id="form-GETapi-payment-history" data-method="GET"
      data-path="api/payment-history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payment-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payment-history"
                    onclick="tryItOut('GETapi-payment-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payment-history"
                    onclick="cancelTryOut('GETapi-payment-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payment-history" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payment-history</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-customer-customer-login">Customer Login</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer-customer-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/customer/customer-login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"abc@gmail.com\",
    \"macaddress\": \"96-D5-9E-67-40-AB\",
    \"otp\": \"123456\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/customer-login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "abc@gmail.com",
    "macaddress": "96-D5-9E-67-40-AB",
    "otp": "123456"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer-customer-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
  &quot;data&quot;: {
     &quot;id&quot;: integer/null,
     &quot;firstname&quot;: string/null,
     &quot;lastname&quot;: string/null,
     &quot;email&quot;: string/null,
     &quot;phoneno&quot;: string/null,
     &quot;dob&quot;: string/null
  },
  &quot;access_token&quot;: string/null,
  &quot;token_type&quot;: string/null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-customer-customer-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer-customer-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-customer-login"></code></pre>
</span>
<span id="execution-error-POSTapi-customer-customer-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-customer-login"></code></pre>
</span>
<form id="form-POSTapi-customer-customer-login" data-method="POST"
      data-path="api/customer/customer-login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-customer-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer-customer-login"
                    onclick="tryItOut('POSTapi-customer-customer-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer-customer-login"
                    onclick="cancelTryOut('POSTapi-customer-customer-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer-customer-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer/customer-login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-customer-customer-login"
               value="abc@gmail.com"
               data-component="body" hidden>
    <br>
<p>Email address of customer.</p>
        </p>
                <p>
            <b><code>macaddress</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="macaddress"
               data-endpoint="POSTapi-customer-customer-login"
               value="96-D5-9E-67-40-AB"
               data-component="body" hidden>
    <br>
<p>Mac Address of customer device.</p>
        </p>
                <p>
            <b><code>otp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="otp"
               data-endpoint="POSTapi-customer-customer-login"
               value="123456"
               data-component="body" hidden>
    <br>
<p>OTP code against the customer device.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-customer-send-otp-code">Send OTP Code</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer-send-otp-code">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/customer/send-otp-code" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"abc@gmail.com\",
    \"macaddress\": \"96-D5-9E-67-40-AB\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/send-otp-code"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "abc@gmail.com",
    "macaddress": "96-D5-9E-67-40-AB"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer-send-otp-code">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
  &quot;deviceVerified&quot;: true/false,
  &quot;data&quot;: {
      &quot;id&quot;: integer/null,
      &quot;firstname&quot;: string/null,
      &quot;lastname&quot;: string/null,
      &quot;email&quot;: string/null,
      &quot;phoneno&quot;: string/null,
      &quot;dob&quot;: string/null
  },
  &quot;access_token&quot;: string/null,
  &quot;token_type&quot;: string/null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-customer-send-otp-code" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer-send-otp-code"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-send-otp-code"></code></pre>
</span>
<span id="execution-error-POSTapi-customer-send-otp-code" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-send-otp-code"></code></pre>
</span>
<form id="form-POSTapi-customer-send-otp-code" data-method="POST"
      data-path="api/customer/send-otp-code"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-send-otp-code', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer-send-otp-code"
                    onclick="tryItOut('POSTapi-customer-send-otp-code');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer-send-otp-code"
                    onclick="cancelTryOut('POSTapi-customer-send-otp-code');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer-send-otp-code" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer/send-otp-code</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-customer-send-otp-code"
               value="abc@gmail.com"
               data-component="body" hidden>
    <br>
<p>Email address of customer.</p>
        </p>
                <p>
            <b><code>macaddress</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="macaddress"
               data-endpoint="POSTapi-customer-send-otp-code"
               value="96-D5-9E-67-40-AB"
               data-component="body" hidden>
    <br>
<p>Mac Address of customer device.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-customer-get-link-detail">Get Link Detail</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer-get-link-detail">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/customer/get-link-detail" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"link\": \"xu\",
    \"LinkId\": \"{\\\"linkId\\\": 1,\\\"service\\\": [{\\\"id\\\": 1},{\\\"id\\\": 2},{\\\"id\\\": 3}]}\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/get-link-detail"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "link": "xu",
    "LinkId": "{\"linkId\": 1,\"service\": [{\"id\": 1},{\"id\": 2},{\"id\": 3}]}"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer-get-link-detail">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-customer-get-link-detail" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer-get-link-detail"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-get-link-detail"></code></pre>
</span>
<span id="execution-error-POSTapi-customer-get-link-detail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-get-link-detail"></code></pre>
</span>
<form id="form-POSTapi-customer-get-link-detail" data-method="POST"
      data-path="api/customer/get-link-detail"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-get-link-detail', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer-get-link-detail"
                    onclick="tryItOut('POSTapi-customer-get-link-detail');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer-get-link-detail"
                    onclick="cancelTryOut('POSTapi-customer-get-link-detail');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer-get-link-detail" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer/get-link-detail</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="link"
               data-endpoint="POSTapi-customer-get-link-detail"
               value="xu"
               data-component="body" hidden>
    <br>
<p>validation.min.</p>
        </p>
                <p>
            <b><code>LinkId</code></b>&nbsp;&nbsp;<small>and</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="LinkId"
               data-endpoint="POSTapi-customer-get-link-detail"
               value="{"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}"
               data-component="body" hidden>
    <br>
<p>service parameter are required. Service should be array type and each row should be exist on id.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-customer-customer_order">POST api/customer/customer_order</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer-customer_order">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/customer/customer_order" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"amount\": \"excepturi\",
    \"email\": \"parisian.ashlee@example.com\",
    \"firstname\": \"dolorum\",
    \"lastname\": \"dolore\",
    \"phoneno\": \"vero\",
    \"card_number\": \"sed\",
    \"expiry_date\": \"et\",
    \"cvc\": \"dolor\",
    \"zip_code\": \"aut\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/customer_order"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "amount": "excepturi",
    "email": "parisian.ashlee@example.com",
    "firstname": "dolorum",
    "lastname": "dolore",
    "phoneno": "vero",
    "card_number": "sed",
    "expiry_date": "et",
    "cvc": "dolor",
    "zip_code": "aut"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer-customer_order">
</span>
<span id="execution-results-POSTapi-customer-customer_order" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer-customer_order"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-customer_order"></code></pre>
</span>
<span id="execution-error-POSTapi-customer-customer_order" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-customer_order"></code></pre>
</span>
<form id="form-POSTapi-customer-customer_order" data-method="POST"
      data-path="api/customer/customer_order"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-customer_order', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer-customer_order"
                    onclick="tryItOut('POSTapi-customer-customer_order');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer-customer_order"
                    onclick="cancelTryOut('POSTapi-customer-customer_order');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer-customer_order" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer/customer_order</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>amount</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="amount"
               data-endpoint="POSTapi-customer-customer_order"
               value="excepturi"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-customer-customer_order"
               value="parisian.ashlee@example.com"
               data-component="body" hidden>
    <br>
<p>validation.email.</p>
        </p>
                <p>
            <b><code>firstname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="firstname"
               data-endpoint="POSTapi-customer-customer_order"
               value="dolorum"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>lastname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="lastname"
               data-endpoint="POSTapi-customer-customer_order"
               value="dolore"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>phoneno</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phoneno"
               data-endpoint="POSTapi-customer-customer_order"
               value="vero"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>card_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="card_number"
               data-endpoint="POSTapi-customer-customer_order"
               value="sed"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>expiry_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="expiry_date"
               data-endpoint="POSTapi-customer-customer_order"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>cvc</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="cvc"
               data-endpoint="POSTapi-customer-customer_order"
               value="dolor"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>zip_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="zip_code"
               data-endpoint="POSTapi-customer-customer_order"
               value="aut"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="endpoints-GETapi-migrate">GET api/migrate</h2>

<p>
</p>



<span id="example-requests-GETapi-migrate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/migrate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/migrate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-migrate">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-migrate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-migrate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-migrate"></code></pre>
</span>
<span id="execution-error-GETapi-migrate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-migrate"></code></pre>
</span>
<form id="form-GETapi-migrate" data-method="GET"
      data-path="api/migrate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-migrate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-migrate"
                    onclick="tryItOut('GETapi-migrate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-migrate"
                    onclick="cancelTryOut('GETapi-migrate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-migrate" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/migrate</code></b>
        </p>
                    </form>

        <h1 id="seller-links">Seller Links</h1>

    <p>APIs endpoints for managing seller</p>

            <h2 id="seller-links-POSTapi-seller-create-link">Create or Update Seller Links</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-create-link">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/create-link" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "fullName=kttyedeecuetxwfxelxwmrfxufgzsjfwffeaeccqyhjaplgzxxnjndhcouzgabbebcfudtadnquqwxqlmwnmjvrxcjqpvlelqkfrzrirhkrmmsxqrpglaokliwadgngwkmqwjwmhcafaxeolmmjsfzvblwcogjiihv" \
    --form "displayName=ahrkeiqoensdbvuokytouvum" \
    --form "link=nobis" \
    --form "updateId=474.85285" \
    --form "image=@C:\Users\umar7\AppData\Local\Temp\phpE481.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/create-link"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('fullName', 'kttyedeecuetxwfxelxwmrfxufgzsjfwffeaeccqyhjaplgzxxnjndhcouzgabbebcfudtadnquqwxqlmwnmjvrxcjqpvlelqkfrzrirhkrmmsxqrpglaokliwadgngwkmqwjwmhcafaxeolmmjsfzvblwcogjiihv');
body.append('displayName', 'ahrkeiqoensdbvuokytouvum');
body.append('link', 'nobis');
body.append('updateId', '474.85285');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-create-link">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-create-link" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-create-link"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-create-link"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-create-link" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-create-link"></code></pre>
</span>
<form id="form-POSTapi-seller-create-link" data-method="POST"
      data-path="api/seller/create-link"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-create-link', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-create-link"
                    onclick="tryItOut('POSTapi-seller-create-link');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-create-link"
                    onclick="cancelTryOut('POSTapi-seller-create-link');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-create-link" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/create-link</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>fullName</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="fullName"
               data-endpoint="POSTapi-seller-create-link"
               value="kttyedeecuetxwfxelxwmrfxufgzsjfwffeaeccqyhjaplgzxxnjndhcouzgabbebcfudtadnquqwxqlmwnmjvrxcjqpvlelqkfrzrirhkrmmsxqrpglaokliwadgngwkmqwjwmhcafaxeolmmjsfzvblwcogjiihv"
               data-component="body" hidden>
    <br>
<p>validation.min validation.max.</p>
        </p>
                <p>
            <b><code>displayName</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="displayName"
               data-endpoint="POSTapi-seller-create-link"
               value="ahrkeiqoensdbvuokytouvum"
               data-component="body" hidden>
    <br>
<p>validation.min validation.max.</p>
        </p>
                <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="link"
               data-endpoint="POSTapi-seller-create-link"
               value="nobis"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="image"
               data-endpoint="POSTapi-seller-create-link"
               value=""
               data-component="body" hidden>
    <br>
<p>Seller profile picture.</p>
        </p>
                <p>
            <b><code>updateId</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="updateId"
               data-endpoint="POSTapi-seller-create-link"
               value="474.85285"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="seller-links-GETapi-seller-get-links-list">Get Seller Links List</h2>

<p>
</p>



<span id="example-requests-GETapi-seller-get-links-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/seller/get-links-list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"page\": \"1\",
    \"limit\": \"20\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/get-links-list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "page": "1",
    "limit": "20"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-seller-get-links-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
  &quot;data&quot;: [
  {
      &quot;id&quot;: number/null,
      &quot;link&quot;: string/null,
      &quot;fullname&quot;: string/null,
      &quot;displayname&quot;: string/null,
      &quot;image&quot;: string/null,
      &quot;services&quot;: [
          {
              &quot;linkServiceId&quot;: number/null,
              &quot;serviceId&quot;: number/null,
              &quot;name&quot;: string/null,
              &quot;price&quot;: string/null
          }
      ]
 }
 ],
  &quot;nextPage&quot;: true/false,
  &quot;limit&quot;: number/20
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-seller-get-links-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-seller-get-links-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-seller-get-links-list"></code></pre>
</span>
<span id="execution-error-GETapi-seller-get-links-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-seller-get-links-list"></code></pre>
</span>
<form id="form-GETapi-seller-get-links-list" data-method="GET"
      data-path="api/seller/get-links-list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-seller-get-links-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-seller-get-links-list"
                    onclick="tryItOut('GETapi-seller-get-links-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-seller-get-links-list"
                    onclick="cancelTryOut('GETapi-seller-get-links-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-seller-get-links-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/seller/get-links-list</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>Its</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="page"
               data-endpoint="GETapi-seller-get-links-list"
               value="1"
               data-component="body" hidden>
    <br>
<p>an optional, by default its consider as 1.</p>
        </p>
                <p>
            <b><code>limit</code></b>&nbsp;&nbsp;<small>Its</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="limit"
               data-endpoint="GETapi-seller-get-links-list"
               value="20"
               data-component="body" hidden>
    <br>
<p>an optional, by default its consider as 20.</p>
        </p>
        </form>

            <h2 id="seller-links-POSTapi-seller-attach-product-with-links">Attach Product With Links</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-attach-product-with-links">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/attach-product-with-links" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"LinkId\": \"{\\\"linkId\\\": 1,\\\"service\\\": [{\\\"id\\\": 1},{\\\"id\\\": 2},{\\\"id\\\": 3}]}\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/attach-product-with-links"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "LinkId": "{\"linkId\": 1,\"service\": [{\"id\": 1},{\"id\": 2},{\"id\": 3}]}"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-attach-product-with-links">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-attach-product-with-links" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-attach-product-with-links"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-attach-product-with-links"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-attach-product-with-links" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-attach-product-with-links"></code></pre>
</span>
<form id="form-POSTapi-seller-attach-product-with-links" data-method="POST"
      data-path="api/seller/attach-product-with-links"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-attach-product-with-links', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-attach-product-with-links"
                    onclick="tryItOut('POSTapi-seller-attach-product-with-links');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-attach-product-with-links"
                    onclick="cancelTryOut('POSTapi-seller-attach-product-with-links');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-attach-product-with-links" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/attach-product-with-links</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>LinkId</code></b>&nbsp;&nbsp;<small>and</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="LinkId"
               data-endpoint="POSTapi-seller-attach-product-with-links"
               value="{"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}"
               data-component="body" hidden>
    <br>
<p>service parameter are required. Service should be array type and each row should be exist on id parameter.</p>
        </p>
        </form>

            <h2 id="seller-links-POSTapi-seller-delete-service-from-link">Delete Services From Link</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-delete-service-from-link">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/delete-service-from-link" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"linkId\": 68149210.3515423,
    \"service\": [
        {
            \"id\": \"occaecati\"
        }
    ],
    \"LinkId\": \"{\\\"linkId\\\": 1,\\\"service\\\": [{\\\"id\\\": 1},{\\\"id\\\": 2},{\\\"id\\\": 3}]}\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/delete-service-from-link"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "linkId": 68149210.3515423,
    "service": [
        {
            "id": "occaecati"
        }
    ],
    "LinkId": "{\"linkId\": 1,\"service\": [{\"id\": 1},{\"id\": 2},{\"id\": 3}]}"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-delete-service-from-link">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-delete-service-from-link" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-delete-service-from-link"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-delete-service-from-link"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-delete-service-from-link" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-delete-service-from-link"></code></pre>
</span>
<form id="form-POSTapi-seller-delete-service-from-link" data-method="POST"
      data-path="api/seller/delete-service-from-link"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-delete-service-from-link', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-delete-service-from-link"
                    onclick="tryItOut('POSTapi-seller-delete-service-from-link');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-delete-service-from-link"
                    onclick="cancelTryOut('POSTapi-seller-delete-service-from-link');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-delete-service-from-link" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/delete-service-from-link</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>linkId</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="linkId"
               data-endpoint="POSTapi-seller-delete-service-from-link"
               value="68149210.351542"
               data-component="body" hidden>
    <br>

        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>service</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>service[].id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="service.0.id"
               data-endpoint="POSTapi-seller-delete-service-from-link"
               value="occaecati"
               data-component="body" hidden>
    <br>

                    </p>
                                    </details>
        </p>
                <p>
            <b><code>LinkId</code></b>&nbsp;&nbsp;<small>and</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="LinkId"
               data-endpoint="POSTapi-seller-delete-service-from-link"
               value="{"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}"
               data-component="body" hidden>
    <br>
<p>service parameter are required. Service should be array type and each row should be exist on id.</p>
        </p>
        </form>

            <h2 id="seller-links-POSTapi-seller-delete-seller-link">Delete Seller Link</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-delete-seller-link">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/delete-seller-link" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"linkId\": \"1\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/delete-seller-link"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "linkId": "1"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-delete-seller-link">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-delete-seller-link" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-delete-seller-link"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-delete-seller-link"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-delete-seller-link" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-delete-seller-link"></code></pre>
</span>
<form id="form-POSTapi-seller-delete-seller-link" data-method="POST"
      data-path="api/seller/delete-seller-link"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-delete-seller-link', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-delete-seller-link"
                    onclick="tryItOut('POSTapi-seller-delete-seller-link');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-delete-seller-link"
                    onclick="cancelTryOut('POSTapi-seller-delete-seller-link');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-delete-seller-link" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/delete-seller-link</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>linkId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="linkId"
               data-endpoint="POSTapi-seller-delete-seller-link"
               value="1"
               data-component="body" hidden>
    <br>
<p>Full name of the Seller.</p>
        </p>
        </form>

        <h1 id="barber-profile-app">Barber profile app</h1>

    <p>APIs endpoints for managing barber profile</p>

            <h2 id="barber-profile-app-POSTapi-seller-social-link">POST api/seller/social-link</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-social-link">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/social-link" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/social-link"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-social-link">
</span>
<span id="execution-results-POSTapi-seller-social-link" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-social-link"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-social-link"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-social-link" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-social-link"></code></pre>
</span>
<form id="form-POSTapi-seller-social-link" data-method="POST"
      data-path="api/seller/social-link"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-social-link', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-social-link"
                    onclick="tryItOut('POSTapi-seller-social-link');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-social-link"
                    onclick="cancelTryOut('POSTapi-seller-social-link');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-social-link" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/social-link</code></b>
        </p>
                    </form>

            <h2 id="barber-profile-app-GETapi-seller-profile-show">GET api/seller/profile-show</h2>

<p>
</p>



<span id="example-requests-GETapi-seller-profile-show">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/seller/profile-show" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/profile-show"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-seller-profile-show">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-seller-profile-show" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-seller-profile-show"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-seller-profile-show"></code></pre>
</span>
<span id="execution-error-GETapi-seller-profile-show" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-seller-profile-show"></code></pre>
</span>
<form id="form-GETapi-seller-profile-show" data-method="GET"
      data-path="api/seller/profile-show"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-seller-profile-show', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-seller-profile-show"
                    onclick="tryItOut('GETapi-seller-profile-show');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-seller-profile-show"
                    onclick="cancelTryOut('GETapi-seller-profile-show');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-seller-profile-show" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/seller/profile-show</code></b>
        </p>
                    </form>

            <h2 id="barber-profile-app-GETapi-seller-get-profile-data">GET api/seller/get-profile-data</h2>

<p>
</p>



<span id="example-requests-GETapi-seller-get-profile-data">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/seller/get-profile-data" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/get-profile-data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-seller-get-profile-data">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-seller-get-profile-data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-seller-get-profile-data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-seller-get-profile-data"></code></pre>
</span>
<span id="execution-error-GETapi-seller-get-profile-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-seller-get-profile-data"></code></pre>
</span>
<form id="form-GETapi-seller-get-profile-data" data-method="GET"
      data-path="api/seller/get-profile-data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-seller-get-profile-data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-seller-get-profile-data"
                    onclick="tryItOut('GETapi-seller-get-profile-data');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-seller-get-profile-data"
                    onclick="cancelTryOut('GETapi-seller-get-profile-data');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-seller-get-profile-data" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/seller/get-profile-data</code></b>
        </p>
                    </form>

            <h2 id="barber-profile-app-POSTapi-seller-update_profile_data">POST api/seller/update_profile_data</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-update_profile_data">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/update_profile_data" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/update_profile_data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-update_profile_data">
</span>
<span id="execution-results-POSTapi-seller-update_profile_data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-update_profile_data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-update_profile_data"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-update_profile_data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-update_profile_data"></code></pre>
</span>
<form id="form-POSTapi-seller-update_profile_data" data-method="POST"
      data-path="api/seller/update_profile_data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-update_profile_data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-update_profile_data"
                    onclick="tryItOut('POSTapi-seller-update_profile_data');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-update_profile_data"
                    onclick="cancelTryOut('POSTapi-seller-update_profile_data');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-update_profile_data" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/update_profile_data</code></b>
        </p>
                    </form>

        <h1 id="customer-app">Customer app</h1>

    <p>APIs endpoints for managing customer registration updation and login using otp</p>

            <h2 id="customer-app-GETapi-customer-profile">GET api/customer/profile</h2>

<p>
</p>



<span id="example-requests-GETapi-customer-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/customer/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-customer-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-customer-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-customer-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customer-profile"></code></pre>
</span>
<span id="execution-error-GETapi-customer-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customer-profile"></code></pre>
</span>
<form id="form-GETapi-customer-profile" data-method="GET"
      data-path="api/customer/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-customer-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-customer-profile"
                    onclick="tryItOut('GETapi-customer-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-customer-profile"
                    onclick="cancelTryOut('GETapi-customer-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-customer-profile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/customer/profile</code></b>
        </p>
                    </form>

            <h2 id="customer-app-POSTapi-customer-profile-update">POST api/customer/profile/update</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer-profile-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/customer/profile/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/customer/profile/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer-profile-update">
</span>
<span id="execution-results-POSTapi-customer-profile-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer-profile-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-profile-update"></code></pre>
</span>
<span id="execution-error-POSTapi-customer-profile-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-profile-update"></code></pre>
</span>
<form id="form-POSTapi-customer-profile-update" data-method="POST"
      data-path="api/customer/profile/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-profile-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer-profile-update"
                    onclick="tryItOut('POSTapi-customer-profile-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer-profile-update"
                    onclick="cancelTryOut('POSTapi-customer-profile-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer-profile-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer/profile/update</code></b>
        </p>
                    </form>

        <h1 id="nfc-request-app">NFC request app</h1>

    <p>APIs endpoints for managing NFC requests</p>

            <h2 id="nfc-request-app-POSTapi-nfcrequest">POST api/nfcrequest</h2>

<p>
</p>



<span id="example-requests-POSTapi-nfcrequest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/nfcrequest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"itaque\",
    \"email\": \"odio\",
    \"contact\": \"reprehenderit\",
    \"detail\": \"dolor\",
    \"shop_name\": \"reiciendis\",
    \"address\": \"officiis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/nfcrequest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "itaque",
    "email": "odio",
    "contact": "reprehenderit",
    "detail": "dolor",
    "shop_name": "reiciendis",
    "address": "officiis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-nfcrequest">
</span>
<span id="execution-results-POSTapi-nfcrequest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-nfcrequest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nfcrequest"></code></pre>
</span>
<span id="execution-error-POSTapi-nfcrequest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nfcrequest"></code></pre>
</span>
<form id="form-POSTapi-nfcrequest" data-method="POST"
      data-path="api/nfcrequest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-nfcrequest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-nfcrequest"
                    onclick="tryItOut('POSTapi-nfcrequest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-nfcrequest"
                    onclick="cancelTryOut('POSTapi-nfcrequest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-nfcrequest" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/nfcrequest</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-nfcrequest"
               value="itaque"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-nfcrequest"
               value="odio"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>contact</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="contact"
               data-endpoint="POSTapi-nfcrequest"
               value="reprehenderit"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>detail</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="detail"
               data-endpoint="POSTapi-nfcrequest"
               value="dolor"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_name"
               data-endpoint="POSTapi-nfcrequest"
               value="reiciendis"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="address"
               data-endpoint="POSTapi-nfcrequest"
               value="officiis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="seller-guest-app">Seller Guest app</h1>

    <p>APIs endpoints for managing seller</p>

            <h2 id="seller-guest-app-POSTapi-seller-register">Register the Seller</h2>

<p>
</p>

<p>This endpoint allows you to register client and generate token for authentication.
Along token client details will be displayed. To call authorized endpoints you need access_token generated by this endpoint.</p>

<span id="example-requests-POSTapi-seller-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"seller@gmail.com\",
    \"google_id\": \"12345678\",
    \"apple_id\": \"12345678\",
    \"password\": \"admin@123\",
    \"account_type\": \"seller\",
    \"image\": \"dolor\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "seller@gmail.com",
    "google_id": "12345678",
    "apple_id": "12345678",
    "password": "admin@123",
    "account_type": "seller",
    "image": "dolor"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
  &quot;data&quot;: {
      &quot;email&quot;: string/null,
      &quot;google_id&quot;: string/null,
      &quot;apple_id&quot;: string/null,
      &quot;status&quot;: 0/1
  },
  &quot;access_token&quot;: string,
  &quot;token_type&quot;: &quot;Bearer&quot;
  }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-register"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-register"></code></pre>
</span>
<form id="form-POSTapi-seller-register" data-method="POST"
      data-path="api/seller/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-register"
                    onclick="tryItOut('POSTapi-seller-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-register"
                    onclick="cancelTryOut('POSTapi-seller-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-seller-register"
               value="seller@gmail.com"
               data-component="body" hidden>
    <br>
<p>The valid email of the seller, its not required if google id or apple id  is given.</p>
        </p>
                <p>
            <b><code>google_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="google_id"
               data-endpoint="POSTapi-seller-register"
               value="12345678"
               data-component="body" hidden>
    <br>
<p>The Google ID of seller, Its required if email or apple id is not given.</p>
        </p>
                <p>
            <b><code>apple_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="apple_id"
               data-endpoint="POSTapi-seller-register"
               value="12345678"
               data-component="body" hidden>
    <br>
<p>The Apple ID of seller, Its required if email or google id is not given.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-seller-register"
               value="admin@123"
               data-component="body" hidden>
    <br>
<p>The Password of seller, Its required if email is given.</p>
        </p>
                <p>
            <b><code>account_type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="account_type"
               data-endpoint="POSTapi-seller-register"
               value="seller"
               data-component="body" hidden>
    <br>
<p>The Password of seller.</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-seller-register"
               value="dolor"
               data-component="body" hidden>
    <br>
<p>The Image Url of seller.</p>
        </p>
        </form>

            <h2 id="seller-guest-app-POSTapi-seller-login">Login the Seller</h2>

<p>
</p>

<p>This endpoint allows you to register client and generate token for authentication.
Along token client details will be displayed. To call authorized endpoints you need access_token generated by this endpoint.</p>

<span id="example-requests-POSTapi-seller-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"seller@gmail.com\",
    \"google_id\": \"12345678\",
    \"apple_id\": \"12345678\",
    \"password\": \"admin@123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "seller@gmail.com",
    "google_id": "12345678",
    "apple_id": "12345678",
    "password": "admin@123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
  &quot;data&quot;: {
      &quot;id&quot;: string/null,
      &quot;fullname&quot;: string/null,
      &quot;displayname&quot;: string/null,
      &quot;email&quot;: string/null,
      &quot;image&quot;: string/null,
      &quot;account_type&quot;: string/null,
      &quot;stripe_account_id&quot;: string/null,
      &quot;stripe_status&quot;: true/false,
      &quot;accountLink&quot;: string/null
  },
  &quot;access_token&quot;: string/null,
  &quot;token_type&quot;: &quot;Bearer&quot;
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-login"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-login"></code></pre>
</span>
<form id="form-POSTapi-seller-login" data-method="POST"
      data-path="api/seller/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-login"
                    onclick="tryItOut('POSTapi-seller-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-login"
                    onclick="cancelTryOut('POSTapi-seller-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-seller-login"
               value="seller@gmail.com"
               data-component="body" hidden>
    <br>
<p>The valid email of the seller, its not required if google id or apple id  is given.</p>
        </p>
                <p>
            <b><code>google_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="google_id"
               data-endpoint="POSTapi-seller-login"
               value="12345678"
               data-component="body" hidden>
    <br>
<p>The Google ID of seller, Its required if email or apple id is not given.</p>
        </p>
                <p>
            <b><code>apple_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="apple_id"
               data-endpoint="POSTapi-seller-login"
               value="12345678"
               data-component="body" hidden>
    <br>
<p>The Apple ID of seller, Its required if email or google id is not given.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-seller-login"
               value="admin@123"
               data-component="body" hidden>
    <br>
<p>The Password of seller, Its required if email is given.</p>
        </p>
        </form>

        <h1 id="seller-profile-app">Seller Profile app</h1>

    <p>APIs endpoints for managing seller</p>

            <h2 id="seller-profile-app-POSTapi-seller-update-basic-detail">Basic Detail Update</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-update-basic-detail">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/update-basic-detail" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"fullname\": \"abc\",
    \"displayname\": \"abc\",
    \"theme\": \"light\",
    \"plan\": \"gold\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/update-basic-detail"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fullname": "abc",
    "displayname": "abc",
    "theme": "light",
    "plan": "gold"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-update-basic-detail">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
  &quot;data&quot;: {
     &quot;id&quot;: number/null,
     &quot;fullname&quot;: string/null,
     &quot;displayname&quot;: string/null
  }
  }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-update-basic-detail" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-update-basic-detail"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-update-basic-detail"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-update-basic-detail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-update-basic-detail"></code></pre>
</span>
<form id="form-POSTapi-seller-update-basic-detail" data-method="POST"
      data-path="api/seller/update-basic-detail"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-update-basic-detail', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-update-basic-detail"
                    onclick="tryItOut('POSTapi-seller-update-basic-detail');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-update-basic-detail"
                    onclick="cancelTryOut('POSTapi-seller-update-basic-detail');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-update-basic-detail" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/update-basic-detail</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>fullname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="fullname"
               data-endpoint="POSTapi-seller-update-basic-detail"
               value="abc"
               data-component="body" hidden>
    <br>
<p>Full name of the Seller.</p>
        </p>
                <p>
            <b><code>displayname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="displayname"
               data-endpoint="POSTapi-seller-update-basic-detail"
               value="abc"
               data-component="body" hidden>
    <br>
<p>Display name of the Seller.</p>
        </p>
                <p>
            <b><code>theme</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="theme"
               data-endpoint="POSTapi-seller-update-basic-detail"
               value="light"
               data-component="body" hidden>
    <br>
<p>validation.required_without_all  Must be one of <code>light</code> or <code>dark</code>.</p>
        </p>
                <p>
            <b><code>plan</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="plan"
               data-endpoint="POSTapi-seller-update-basic-detail"
               value="gold"
               data-component="body" hidden>
    <br>
<p>validation.required_without_all  Must be one of <code>personal</code> or <code>gold</code>.</p>
        </p>
        </form>

            <h2 id="seller-profile-app-POSTapi-seller-update-seller-profile">Update Seller Image</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-update-seller-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/update-seller-profile" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "fullname=abc" \
    --form "displayname=abc" \
    --form "image=@C:\Users\umar7\AppData\Local\Temp\phpE420.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/update-seller-profile"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('fullname', 'abc');
body.append('displayname', 'abc');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-update-seller-profile">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string,
  &quot;data&quot;: {
     &quot;id&quot;: number/null,
     &quot;fullname&quot;: string/null,
     &quot;displayname&quot;: string/null
  }
  }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-update-seller-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-update-seller-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-update-seller-profile"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-update-seller-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-update-seller-profile"></code></pre>
</span>
<form id="form-POSTapi-seller-update-seller-profile" data-method="POST"
      data-path="api/seller/update-seller-profile"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-update-seller-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-update-seller-profile"
                    onclick="tryItOut('POSTapi-seller-update-seller-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-update-seller-profile"
                    onclick="cancelTryOut('POSTapi-seller-update-seller-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-update-seller-profile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/update-seller-profile</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="image"
               data-endpoint="POSTapi-seller-update-seller-profile"
               value=""
               data-component="body" hidden>
    <br>
<p>validation.image validation.max.</p>
        </p>
                <p>
            <b><code>fullname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="fullname"
               data-endpoint="POSTapi-seller-update-seller-profile"
               value="abc"
               data-component="body" hidden>
    <br>
<p>Full name of the Seller.</p>
        </p>
                <p>
            <b><code>displayname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="displayname"
               data-endpoint="POSTapi-seller-update-seller-profile"
               value="abc"
               data-component="body" hidden>
    <br>
<p>Display name of the Seller.</p>
        </p>
        </form>

            <h2 id="seller-profile-app-GETapi-seller-check-stripe-status">Check Seller Stripe Status</h2>

<p>
</p>



<span id="example-requests-GETapi-seller-check-stripe-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/seller/check-stripe-status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/check-stripe-status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-seller-check-stripe-status">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-seller-check-stripe-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-seller-check-stripe-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-seller-check-stripe-status"></code></pre>
</span>
<span id="execution-error-GETapi-seller-check-stripe-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-seller-check-stripe-status"></code></pre>
</span>
<form id="form-GETapi-seller-check-stripe-status" data-method="GET"
      data-path="api/seller/check-stripe-status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-seller-check-stripe-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-seller-check-stripe-status"
                    onclick="tryItOut('GETapi-seller-check-stripe-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-seller-check-stripe-status"
                    onclick="cancelTryOut('GETapi-seller-check-stripe-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-seller-check-stripe-status" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/seller/check-stripe-status</code></b>
        </p>
                    </form>

            <h2 id="seller-profile-app-POSTapi-get_path">POST api/get_path</h2>

<p>
</p>



<span id="example-requests-POSTapi-get_path">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/get_path" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/get_path"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-get_path">
</span>
<span id="execution-results-POSTapi-get_path" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-get_path"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-get_path"></code></pre>
</span>
<span id="execution-error-POSTapi-get_path" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-get_path"></code></pre>
</span>
<form id="form-POSTapi-get_path" data-method="POST"
      data-path="api/get_path"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-get_path', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-get_path"
                    onclick="tryItOut('POSTapi-get_path');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-get_path"
                    onclick="cancelTryOut('POSTapi-get_path');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-get_path" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/get_path</code></b>
        </p>
                    </form>

        <h1 id="services-app">Services app</h1>

    <p>APIs endpoints for managing Services creation, updation, deletion and showing data.</p>

            <h2 id="services-app-GETapi-seller-get-all-services">Listing Of Services</h2>

<p>
</p>



<span id="example-requests-GETapi-seller-get-all-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/seller/get-all-services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"page\": \"1\",
    \"limit\": \"20\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/get-all-services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "page": "1",
    "limit": "20"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-seller-get-all-services">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
  &quot;data&quot;: [
      {
          &quot;id&quot;: string/null,
          &quot;product_name&quot;: string/null,
          &quot;price&quot;: string/null,
          &quot;status&quot;: &quot;1/0&quot;
      }
  ],
  &quot;nextPage&quot;: false,
  &quot;limit&quot;: number/20
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-seller-get-all-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-seller-get-all-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-seller-get-all-services"></code></pre>
</span>
<span id="execution-error-GETapi-seller-get-all-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-seller-get-all-services"></code></pre>
</span>
<form id="form-GETapi-seller-get-all-services" data-method="GET"
      data-path="api/seller/get-all-services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-seller-get-all-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-seller-get-all-services"
                    onclick="tryItOut('GETapi-seller-get-all-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-seller-get-all-services"
                    onclick="cancelTryOut('GETapi-seller-get-all-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-seller-get-all-services" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/seller/get-all-services</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>Its</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="page"
               data-endpoint="GETapi-seller-get-all-services"
               value="1"
               data-component="body" hidden>
    <br>
<p>an optional, by default its consider as 1.</p>
        </p>
                <p>
            <b><code>limit</code></b>&nbsp;&nbsp;<small>Its</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="limit"
               data-endpoint="GETapi-seller-get-all-services"
               value="20"
               data-component="body" hidden>
    <br>
<p>an optional, by default its consider as 20.</p>
        </p>
        </form>

            <h2 id="services-app-POSTapi-seller-add-service">Add OR Update The Services</h2>

<p>
</p>



<span id="example-requests-POSTapi-seller-add-service">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://allset.itsumar.com/api/seller/add-service" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": \"[{\\\"id\\\":string\\/null,\\\"product_name\\\":string\\/null,\\\"price\\\":string\\/null,\\\"status\\\":\\\"1\\/0\\\"}]\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/add-service"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": "[{\"id\":string\/null,\"product_name\":string\/null,\"price\":string\/null,\"status\":\"1\/0\"}]"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-seller-add-service">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-seller-add-service" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-seller-add-service"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-seller-add-service"></code></pre>
</span>
<span id="execution-error-POSTapi-seller-add-service" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-seller-add-service"></code></pre>
</span>
<form id="form-POSTapi-seller-add-service" data-method="POST"
      data-path="api/seller/add-service"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-seller-add-service', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-seller-add-service"
                    onclick="tryItOut('POSTapi-seller-add-service');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-seller-add-service"
                    onclick="cancelTryOut('POSTapi-seller-add-service');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-seller-add-service" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/seller/add-service</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>data</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="data"
               data-endpoint="POSTapi-seller-add-service"
               value="[{"id":string/null,"product_name":string/null,"price":string/null,"status":"1/0"}]"
               data-component="body" hidden>
    <br>
<p>Its required parameter and must has product_name,price,status parameters in each row. Pass the id parameter if service record has to update.</p>
        </p>
        </form>

            <h2 id="services-app-DELETEapi-seller-delete-service--id-">Delete Of Services</h2>

<p>
</p>



<span id="example-requests-DELETEapi-seller-delete-service--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://allset.itsumar.com/api/seller/delete-service/perspiciatis" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/seller/delete-service/perspiciatis"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-seller-delete-service--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;status&quot;: true/false,
  &quot;message&quot;: string/null,
 }</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-seller-delete-service--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-seller-delete-service--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-seller-delete-service--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-seller-delete-service--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-seller-delete-service--id-"></code></pre>
</span>
<form id="form-DELETEapi-seller-delete-service--id-" data-method="DELETE"
      data-path="api/seller/delete-service/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-seller-delete-service--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-seller-delete-service--id-"
                    onclick="tryItOut('DELETEapi-seller-delete-service--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-seller-delete-service--id-"
                    onclick="cancelTryOut('DELETEapi-seller-delete-service--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-seller-delete-service--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/seller/delete-service/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="DELETEapi-seller-delete-service--id-"
               value="perspiciatis"
               data-component="url" hidden>
    <br>
<p>The ID of the delete service.</p>
            </p>
                    </form>

        <h1 id="webpages-app">Webpages app</h1>

    <p>APIs endpoints for managing webpages</p>

            <h2 id="webpages-app-GETapi-webpages_show">GET api/webpages_show</h2>

<p>
</p>



<span id="example-requests-GETapi-webpages_show">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://allset.itsumar.com/api/webpages_show" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://allset.itsumar.com/api/webpages_show"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-webpages_show">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-webpages_show" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-webpages_show"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-webpages_show"></code></pre>
</span>
<span id="execution-error-GETapi-webpages_show" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-webpages_show"></code></pre>
</span>
<form id="form-GETapi-webpages_show" data-method="GET"
      data-path="api/webpages_show"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-webpages_show', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-webpages_show"
                    onclick="tryItOut('GETapi-webpages_show');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-webpages_show"
                    onclick="cancelTryOut('GETapi-webpages_show');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-webpages_show" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/webpages_show</code></b>
        </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
