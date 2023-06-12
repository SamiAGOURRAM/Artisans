import React, { useState, useEffect } from "react";
import Carousel from "react-multi-carousel";
import "react-multi-carousel/lib/styles.css";
import axiosClient from "../../axios";
import Card from "./Card";



export default function ServiceSection({ services }) {
  
  const responsive = {
    desktop: {
      breakpoint: { max: 3000, min: 1024 },
      items: 3,
      slidesToSlide: 3, // Number of services to slide at a time
    },
    tablet: {
      breakpoint: { max: 1024, min: 640 },
      items: 2,
      slidesToSlide: 2,
    },
    mobile: {
      breakpoint: { max: 640, min: 0 },
      items: 1,
      slidesToSlide: 1,
    },
  };

  return (
    
    <div>



      <section className=" bg-gray-50" id="services">
      <div className=" py-20 flex flex-col items-center justify-center">
            <div className="xl:w-1/2 w-11/12">
                <h1 role="heading" tabIndex={0} className="text-6xl font-bold 2xl:leading-10 leading-0 text-center text-gray-800">Rediscovering Local Artisans</h1>
                <h2 role="contentinfo" tabIndex={0} className="text-base leading-normal text-center text-gray-600 mt-5">
                Unite, Discover, and Celebrate: Connect with local artisans and embrace the beauty of regional craftsmanship on our dedicated website!</h2>
            </div>
    </div>
      <div className="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl">
      <Carousel
        responsive={responsive}
        draggable={false}
        infinite={true}
        autoPlay={false}
      >
        {services.map((service) => (
          <Card service={service} key={service.service_id}/>
        ))}
      </Carousel>
    </div>
      </section>

    </div>

    
  );
}
