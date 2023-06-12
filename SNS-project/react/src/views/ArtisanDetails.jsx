import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axiosClient from '../axios';
import { Rating } from '@mui/material';
import NavBar from '../assets/components/navBar';

export default function ArtisanDetails() {
  const { artisan_id } = useParams();
  const [artisanObject, setArtisan] = useState(null);
  const [rating, setRating] = useState(null);
  const [ratingCount, setRatingCount] = useState(null);
  const [services, setServices] = useState([]);

  useEffect(() => {
    // Fetch artisan data from the server using Axios
    axiosClient
      .get("/getArtisan?artisan_id=" + artisan_id)
      .then(({ data }) => {
        setArtisan(data.artisan);
        setRating(data.mean_rating);
        setRatingCount(data.review_count);
        setServices(data.services);
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response.data);
        }
      });
  }, [artisan_id]);

  if (!artisanObject) {
    return <p>Loading...</p>;
  }

  const { company_name, company_address, description, profile_picture } = artisanObject[0];
  console.log(services)

  return (
    <div>
      <NavBar />
      <div className="bg-gray-100 min-h-screen flex items-center justify-center flex-column">
        <div className="bg-white shadow-md rounded-md p-8">
          <div className="flex items-center justify-between">
            <h1 className="text-2xl font-bold">{company_name}</h1>
            <div className="w-20 h-20 rounded-full overflow-hidden">
              <img src={profile_picture} alt="Artisan" className="w-full h-full object-cover" />
            </div>
          </div>
          <div className="flex items-center mb-4">
            <Rating name="read-only" value={rating} readOnly />
            <small className="text-gray-500">{'(' + ratingCount + ')'}</small>
          </div>
          <div className="flex items-center mb-4">
            <span className="text-gray-500">Location:</span>
            <span className="ml-2 font-bold">{company_address}</span>
          </div>
          <div className="mb-4">
            <span className="text-gray-500">Description:</span>
            <p className="mt-2">{description}</p>
          </div>
          <div>
            <span className="text-gray-500">Services:</span>
            <ul className="mt-2">
              {services.map((service, index) => (
                <li key={index}>{service.service_name}</li>
              ))}
            </ul>
          </div>
          <div className='flex justify-center items-center'>
          <button type="button" className='className="mt-4 bg-teal-800 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'>Send Request</button>
          </div>
        </div>
        
      </div>
    </div>
  );
}
