import React from 'react'
import { userStateContext } from '../../contexts/ContextProvider';
import { NavLink } from 'react-router-dom';
import { Menu } from '@headlessui/react';

  


export default function UserMenu() {
const {currentUser, userToken,setCurrentUser, setUserToken} = userStateContext();
function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
  }
if(userToken){
    return(
        <Menu.Items className="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <Menu.Item>

                          <a
                            href="#"
                            className= 'bg-gray-100'
                          >
                            Your Profile
                          </a>

                      </Menu.Item>
                      <Menu.Item>

                          <a
                            href="#"
                            className= 'bg-gray-100'
                          >
                            Settings
                          </a>

                      </Menu.Item>
                      <Menu.Item>

                          <a
                            onClick={(ev)=>{logout(ev)}}
                            href="#"
                            className= 'bg-gray-100'
                          >
                            Sign out
                          </a>

                        
                      </Menu.Item>
                    </Menu.Items>
    )
}else
  return (
    <Menu.Items className="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <Menu.Item>

                          <NavLink
                            to="/login"
                            className= 'bg-gray-100'
                          >
                            Log in
                          </NavLink>

                      </Menu.Item>
                    </Menu.Items>
  )
}
