@extends('frontend.main_master')
@section('content')
<section id="ts-features" class="ts-features">
        <div class="testimonial-card">
        <div style="display: flex; gap: 1rem; /* space-x-4 */">
          <img src="{{ asset('frontend/assets/images/pierre250.png')}}" alt="Portrait of Aliya, a client, wearing sunglasses and a floral outfit">
          <div style="display: flex; flex-direction: column; justify-content: center;">
            <p class="name">{{__('index.pierreguide')}}</p>
            <p class="title">{{__('index.randonnez')}}</p>
          </div>
        </div>
        <div style="margin-top: 1rem; /* mt-4 */">
          <p>{{__('index.pierrerando')}}</p>
        </div>
      </div>
</section>
<style>

  .testimonial-card {
    background-color: #ffffff; /* bg-white */
    padding: 1.5rem; /* p-6 */
    border-radius: 0.5rem; /* rounded-lg */
    color: #1f2937; /* text-gray-800 */
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    max-width: 38rem; /* max-w-lg */
    margin-left: auto;
    margin-right: auto;
    margin-top: 2.5rem; /* my-10 */
    margin-bottom: 2.5rem;
  }
  .testimonial-card img {
    width: 8rem; /* w-24 */
    height: 8rem; /* h-24 */
    border-radius: 9999px; /* rounded-full */
    border: 0.5rem solid #facc15; /* border-4 border-yellow-300 */
  }
  .testimonial-card .name {
    font-weight: 600; /* font-semibold */
    font-size: 1.125rem; /* text-lg */
  }
  .testimonial-card .title {
    color: #d97706; /* text-yellow-500 */
  }
  .testimonial-card p {
    color: #4b5563; /* text-gray-600 */
  }

</style>
@endsection