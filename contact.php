<?php include './Temp/header.php' ?>

<div class="flex w-full h-auto p-10 items-center gap-6">
    <div class="w-2/3 flex flex-col items-center">
               <span class="block mb-4 text-base text-primary font-semibold">
               Contact Us
               </span>
               <h2
                  class="
                  text-dark
                  mb-6
                  uppercase
                  font-bold
                  text-[32px]
                  sm:text-[40px]
                  lg:text-[36px]
                  xl:text-[40px]
                  "
                  >
                  GET IN TOUCH WITH US
               </h2>
               <p class="text-base text-body-color leading-relaxed mb-9">
                Want to get in touch? We'd love to hear from you. Here's how you can reach us...
               </p>
               <img src="https://img.freepik.com/free-vector/service-24-7-concept-illustration_114360-7500.jpg?w=740&t=st=1673105433~exp=1673106033~hmac=c6c1b7814119b4757426f4fa607015f1cc45723c2acc3c49909c886978faba95" 
                  alt="contact image"
                  class="h-2/5 w-2/5"
               >

    </div>
    <div class="w-2/5 px-10 py-5 bg-base-50 shadow-xl sm:w-48px-2">
               <form>
                  <div class="mb-6">
                     <input
                        type="text"
                        placeholder="Your Name"
                        class="
                        w-full
                        rounded
                        py-3
                        px-[14px]
                        text-body-color text-base
                        border border-[f0f0f0]
                        outline-none
                        focus-visible:shadow-none
                        focus:border-primary
                        "
                        />
                  </div>
                  <div class="mb-6">
                     <input
                        type="email"
                        placeholder="Your Email"
                        class="
                        w-full
                        rounded
                        py-3
                        px-[14px]
                        text-body-color text-base
                        border border-[f0f0f0]
                        outline-none
                        focus-visible:shadow-none
                        focus:border-primary
                        "
                        />
                  </div>
                  <div class="mb-6">
                     <input
                        type="text"
                        placeholder="Your Phone"
                        class="
                        w-full
                        rounded
                        py-3
                        px-[14px]
                        text-body-color text-base
                        border border-[f0f0f0]
                        outline-none
                        focus-visible:shadow-none
                        focus:border-primary
                        "
                        />
                  </div>
                  <div class="mb-6">
                     <textarea
                        rows="6"
                        placeholder="Your Message"
                        class="
                        w-full
                        rounded
                        py-3
                        px-[14px]
                        text-body-color text-base
                        border border-[f0f0f0]
                        resize-none
                        outline-none
                        focus-visible:shadow-none
                        focus:border-primary
                        "
                        ></textarea>
                  </div>
                  <div>
                     <button
                        type="submit"
                        class="
                        w-full
                        text-white
                        bg-teal-800
                        rounded
                        border border-primary
                        p-3
                        transition
                        hover:bg-opacity-90
                        "
                        >
                     Send Message
                     </button>
                  </div>
               </form>

    </div>
</div>

<?php
 include "./Temp/Footer.php"
 ?>