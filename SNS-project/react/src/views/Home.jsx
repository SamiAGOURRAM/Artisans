import { Navigate } from "react-router-dom";
import NavBar from "../assets/components/navBar";
import { userStateContext } from "../contexts/ContextProvider";
import AboutSection from "../assets/components/AboutSection";
import ServiceSection from "../assets/components/ServiceSection";
import { useEffect, useState } from "react";
import axiosClient from "../axios";
import Partners from "../assets/components/Partners";
import Contact from "../assets/components/Contact";
import Footer from "../assets/components/Footer";


export default function Home() {
    const [services, setServices] = useState([]);


    useEffect(() => {
        // Fetch service data from the server using Axios
        axiosClient
          .post("/services")
          .then(({ data }) => {
            setServices(data.services);
          })
          .catch((error) => {
            if (error.response) {
              console.log(error.response.data);
            }
          });
      }, []);

    const { currentUser, userToken } = userStateContext();
    if (!userToken) {
        return <Navigate to="/login" />;
    }
    return (
        <div>
            <NavBar />
            <AboutSection />
            <hr />
            <ServiceSection services={services} />
            <hr />
            <Partners />
            <hr />
            <Contact />
            <Footer />
            
        </div>
    );
}
