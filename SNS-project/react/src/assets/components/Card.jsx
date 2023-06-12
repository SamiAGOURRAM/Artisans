import React from 'react'
import { Navigate } from 'react-router-dom';

export default function Card({service, image_link='https://th.bing.com/th/id/R.9d75811ab70afc49781a7bacd8b4c176?rik=q4PRp%2bHpDM%2bf5g&riu=http%3a%2f%2fstlpainters.com%2fwp-content%2fuploads%2f2019%2f04%2fHiring-A-Painter-St-Louis-1200x698.jpg&ehk=pmhdrlnAhDwVWqX8h4OEoqdkLiRh0hd8fvJZyAUrYRU%3d&risl=&pid=ImgRaw&r=0'}) {
    const service_name = service.service_name;
    const service_desc = service.service_description
    const handleClick = (service_id) => {
        window.location.href = '/Artisans?service_id='+service_id
      };
  return (
    
<div className="bg-gray-800 dark:bg-white shadow-xl p-6 rounded-lg w-72 relative">
  <figure><img src={image_link} alt={service_name}/></figure>
  <div className="mt-4 text-white dark:text-gray-900">
    <h2 className="text-xl font-bold mb-2">{service_name}</h2>
    <p className=''>{service_desc}</p>
    <div className="flex justify-end mt-4">
      <button type='button' onClick={() => handleClick(service.service_id)} className="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Check Artisans</button>
    </div>
  </div>
</div>

  )
}
