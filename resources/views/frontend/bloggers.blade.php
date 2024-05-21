@extends('frontend.main_master')
@section('content')

<style>
    .cta {
        text-align: center;
        margin: 30px 0;
    }

    .cta a {
        text-decoration: none;
        background-color: #007BFF;
        color: white;
        padding: 15px 25px;
        border-radius: 5px;
        font-size: 1.2em;
        transition: background-color 0.3s ease;
    }

    .cta a:hover {
        background-color: #0056b3;
    }

    footer {
        text-align: center;
        padding: 20px 0;
        font-size: 0.9em;
        color: #999;
    }
</style>


<div class="container">
    <div class="row">
        <h1>Join Our Blogger Partnership Program</h1>
        <p>Help your audience discover the hidden gems of Iceland with Charly Explore Iceland audioguide.</p>
    </div>

    <section>
        <h2>Why Partner with Us?</h2>
        <p>
            At My Secret Map, we have created a comprehensive digital guide, “Charly Explore Iceland,” featuring 200 amazing spots and 5 hours of engaging audio content in English, French, and German. By partnering with us, you can provide your readers with exclusive access to our guide, helping them uncover the hidden treasures of Iceland.
        </p>
    </section>

    <section>
        <h2>How It Works</h2>
        <p>
            As a partner, you will receive a unique QR code and link to share on your blog. For every sale made through your link, you will earn a 30% commission. We provide all the necessary promotional materials, including banners, videos, and posters. It’s a simple and effective way to enhance your content and earn revenue.
        </p>
    </section>

    <section>
        <h2>What We Offer</h2>
        <ul>
            <li>30% commission on every sale</li>
            <li>Exclusive promotional materials (banners, videos, posters)</li>
            <li>Easy integration with your blog</li>
            <li>Support from our dedicated partnership team</li>
        </ul>
    </section>

    <section class="cta">
        <a href="mailto:fabrice@my-lovely-planet.com?subject=Partnership%20Inquiry%20Audioguide">Join Now</a>
    </section>

    <footer>
        <p>For more information, visit our <a href="https://www.facebook.com/mysecretmap">Facebook page</a>.</p>
    </footer>