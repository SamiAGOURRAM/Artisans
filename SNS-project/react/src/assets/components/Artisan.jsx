import React, { useContext, useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Rating from '@mui/material/Rating';

import { BsPlus, BsEyeFill } from "react-icons/bs";
import axiosClient from "../../axios";


const Artisan = ({ artisan, service }) => {

  // destructure product
  const { artisan_id,user_id,company_name,company_address,description,profile_picture } = artisan;
  const [meanRating, setMeanRating] = useState(null);
  const [ratingCount, setratingCount] = useState(null);


  useEffect(() => {
    // Fetch service data from the server using Axios
    axiosClient
      .post("/getReview", {artisan_id})
      .then(({ data }) => {
        setMeanRating(data.mean_rating)
        setratingCount(data.review_count)
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response.data);
        }
      });
  }, [artisan_id]);
  return (
    <div>
      <div className=" h-[300px] mb-4 relative overflow-hidden group transition shadow-lg rounded">
        <div className="w-full h-full flex justify-center items-center">
          {/* image */}
          <div className="w-[200px] mx-auto flex justify-center items-center">
            <img
              className="max-h-[160px] group-hover:scale-110 transition duration-300"
              src={profile_picture}
              alt=""
            />
          </div>
        </div>
        {/* buttons */}
        <div className="absolute top-6 -right-11 group-hover:right-5 p-2 flex flex-col justify-center items-center gap-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
          <button>
            <div className="flex justify-center items-center text-white w-12 h-12 bg-teal-500">
              <BsPlus className="text-3xl" />
            </div>
          </button>
          <Link
            to={`/Artisans/details/${artisan_id}`}
            className="w-12 h-12 bg-white flex justify-center items-center text-primary drop-shadow-xl"
          >
            <BsEyeFill />
          </Link>
        </div>
      </div>
      {/* category, title & price */}
      <div>
        <div className="tex-sm capitalize mb-1 text-gray-800">{company_name}</div>
        <Link to={`/product/id`}>
          <h2 className="font-semibold mb-1 text-gray-800">{description}</h2>
        </Link>
        <div className="flex items-center justify-between">
        <Rating name="read-only" value={meanRating} precision={0.1} readOnly />
        <small className="text-gray-500">{'('+ratingCount+')'}</small>
        </div>
        
      </div>
    </div>
  );
};

export default Artisan;