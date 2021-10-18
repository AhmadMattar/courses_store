@extends('outside.master')
@section('content')
    <main>
      <section class="page-header bg-light py-5">
        <div class="container">
          <div class="row">
            <div class="col">
              <ol class="list-unstyled d-flex">
                <li><a href="https://bakkah.com">Home</a></li>
                <li class="mx-4">Contact Us</li>
              </ol>
              <h1>Contact Us</h1>
            </div>
          </div>
        </div>
      </section>

      <section class="courses py-5">
        <div class="container">
          <div class="row text-center mb-5">
            <div class="col-md-3">
              <div class="contact-box">
                <i class="far fa-envelope fa-3x"></i>
                <h3>Email Address</h3>
                <p>
                  <a href="mailto:contactus@bakkah.net.sa" class="email"
                    >contactus@bakkah.net.sa</a
                  >
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="contact-box">
                <i class="fas fa-map-marker-alt fa-3x"></i>
                <h3>Our Address</h3>
                <div class="adr">
                  <div class="street-address">
                    7344 Othman Bin Affan – Al Narjis Dist. Unit No 76
                  </div>
                  <span class="locality">Al Narjis</span>,
                  <span class="region">Riyadh</span>,
                  <span class="postal-code">13327</span>
                  <span class="country-name">Saudi Arabia</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="contact-box">
                <i class="fas fa-fax fa-3x"></i>
                <h3>Phone / Fax</h3>
                <p class="tel">
                  +966 (920003928)<br />Fax: +966 (112101141)<br />P.O. Box
                  86593
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="contact-box">
                <i class="far fa-calendar-alt fa-3x"></i>
                <h3>Business Hours</h3>
                <p>Sunday – Thursday<br />8:00 a.m. – 5:30 p.m.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-group">
                      <input
                        type="text"
                        name="name"
                        value=""
                        placeholder="Your Name *"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-group">
                      <input
                        type="email"
                        name="email"
                        value=""
                        placeholder="Your Email *"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-group">
                      <input
                        type="tel"
                        name="mobile"
                        value=""
                        placeholder="Your Mobile "
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-group">
                      <input
                        type="text"
                        name="name"
                        value=""
                        placeholder="Subject"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea
                        name="message"
                        cols="40"
                        rows="5"
                        placeholder="Your Message *"
                        class="form-control"
                      ></textarea>
                    </div>
                  </div>
                </div>
                <p style="padding-top: 15px">
                  <input
                    type="submit"
                    value="Send"
                    class="btn btn-dark btn-lg px-5 float-end"
                  />
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
@stop
