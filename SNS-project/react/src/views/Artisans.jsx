import React, { useEffect, useState } from 'react';
import { Navigate } from 'react-router-dom';
import axiosClient from '../axios';
import { userStateContext } from '../contexts/ContextProvider';
import Artisan from '../assets/components/Artisan';
import Footer from '../assets/components/Footer';
import NavBar from '../assets/components/navBar';

export default function Artisans() {
  const urlParams = new URLSearchParams(window.location.search);

  // Retrieve the value of the 'service_id' parameter
  const serviceId = urlParams.get('service_id');
  console.log(serviceId);

  // Use the serviceId value as needed
  const [artisans, setArtisans] = useState([]);
  const { userToken } = userStateContext();

  useEffect(() => {
    // Fetch artisan data from the server using Axios
    axiosClient
      .get("/Artisans?service_id=" + serviceId)
      .then(({ data }) => {
        setArtisans(data);
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response.data);
        }
      });
  }, [serviceId]);

  if (!userToken) {
    return <Navigate to="/login" />;
  }

  return (
    <div>
      <NavBar />
      <div className="container mx-auto">
        <section className="py-20">
          <div className="container mx-auto">
            <h1 className="text-3xl font-semibold mb-10 text-center text-gray-800">Explore Our Artisans</h1>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 lg:mx-8 gap-[30px] max-w-sm mx-auto md:max-w-none md:mx-0">
              {artisans.map((artisan) => (
                <Artisan key={artisan.artisan_id} artisan={artisan} service={serviceId} />
              ))}
            </div>
          </div>
        </section>
      </div>
      <Footer />
    </div>
  );
}
