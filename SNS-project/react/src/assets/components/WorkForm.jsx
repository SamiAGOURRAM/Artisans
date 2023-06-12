import React, { useEffect, useState } from 'react'
import axiosClient from '../../axios'
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Footer from './Footer';


export default function WorkForm() {
    const [isSubmitted, setIsSubmitted] = useState(false);
    const [company_name, setCompanyName] = useState(null);
    const [company_address, setCompanyAddress] = useState(null);
    const [description, setDescription] = useState(null);
    const [profile_picture, setImageLink] = useState(null);
    const [service_id, setService] =useState(null);
    
    const user_id = localStorage.USER;
    

    const handleFormSubmit = (event) => {
        event.preventDefault();
        console.log(service_id);
        axiosClient.post('/Work',{ 
            user_id, 
            company_name,
            company_address,
            description,
            profile_picture,
            service_id
        })
        .then(({data}) =>{
            setIsSubmitted(true)
        setTimeout(() => {
          toast.success('Application submitted successfully!', {
            position: toast.POSITION.TOP_RIGHT,
          });
        }, 200);
            
        })
        .catch((error) => {
            if(error.response){
              console.log(error.response.data);
              const finalErrors = error.response.data.message;
              toast.error(finalErrors, {
                position: toast.POSITION.TOP_RIGHT,
              });
            }
          })
    
        // Simulating a successful form submission
        // Replace this with your actual form submission logic
        
      };


    const [services , setServices] = useState();
    useEffect(()=>{
        axiosClient
    .post('/services')
    .then(({data})=>{
        setServices(data.services);
    })
    .catch((error) => {
        if (error.response) {
          console.log(error.response.data);
        }
      });

    },[])
    if(!services){
        return(
            <div></div>
        )
    }
    
  return (
    <div>
    <div className='container flex items-center justify-center h-screen mx-auto'>
        <form className="w-full max-w-lg" onSubmit={handleFormSubmit}>
  <div className="flex flex-wrap -mx-3 mb-6">
    <div className="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="company_name">
        Company Name
      </label>
      <input 
      value={company_name || ''}
      onChange={(ev)=>{setCompanyName(ev.target.value)}}
      className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="company_name" type="text" placeholder="DarDecor" required />
    </div>
    <div className="w-full md:w-1/2 px-3">
    <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="company_add">
        Company Address
      </label>
      <input 
      value={company_address || ''}
      onChange={(ev)=>{setCompanyAddress(ev.target.value)}}
      className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="company_add" type="text" placeholder="Casablanca" required />
    </div>
  </div>
  <div className="flex flex-wrap -mx-3 mb-6">
    <div className="w-full px-3">
      <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="description">
        Description
      </label>
      <input 
      value={description || ''}
      onChange={(ev)=>{setDescription(ev.target.value)}}
      className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" type="text" placeholder="Why choose you?" required />
      <p className="text-gray-600 text-xs italic">Please talk a little bit about your Job</p>
    </div>
  </div>

  <div className="flex flex-wrap -mx-3 mb-6">
    <div className="w-full px-3">
      <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="imageLink">
        Profile Image Link 
      </label>
      <input
      value={profile_picture || ''}
      onChange={(ev)=>{setImageLink(ev.target.value)}}
       className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="imageLink" type="text" placeholder="https://media.licdn.com/dms/image/D4D03AQH9vuuR-BoF1A/profile-displayphoto-shrink_800_800/0/1680090470780?e=1692230400&v=beta&t=uvPHCjVEHCZnJgx8mq5Ik2iHO-ihM9YgmC9g3adCSA0?" required />
      <p className="text-gray-600 text-xs italic">You can enter your Linkedin profile image link !</p>
    </div>
  </div>

  <div className="flex flex-wrap -mx-3 mb-6">
    <div className="w-full px-3">
    <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="service">
        Service
      </label>
      <select 
      value={service_id || ''}
      onChange={(ev)=>{setService(ev.target.value);
    setIsSubmitted(false)}}
      className="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="service">
        {services.map((option) => (
                  <option value={option.service_id} key={option.service_id}>{option.service_name}</option>
                ))}
        </select>
    </div>
  </div>
  <div className="flex justify-center items-center" style={{ marginTop: "5%" }}>
    <div className=" flex items-center justify-center">
      <input className="shadow bg-teal-700 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Apply !" disabled={isSubmitted}  />
    </div>
  </div>
</form>
<ToastContainer />
    </div>
    <Footer/>
    </div>
  );
}
