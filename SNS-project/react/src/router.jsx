import { Outlet, createBrowserRouter } from "react-router-dom";
import Login from "./views/login";
import Home from "./views/home";
import Signup from "./views/signup";
import Guest from "./views/Guest";
import Artisans from "./views/Artisans";
import WorkApply from "./views/WorkApply";
import { Children } from "react";
import ArtisanDetails from "./views/ArtisanDetails";
const router = createBrowserRouter([
    {
        path:'/home',
        element: <Home />
    },
    {
        path:'/',
        element: <Home />,
        
    },
    {
        path: '/Artisans',
        element: <Artisans />,
    },
    {
        path:'Artisans/details/:artisan_id',
        element:<ArtisanDetails />
    },
    {
        path:'/work',
        element: <WorkApply/>
    },
    {
        path:'/',
        element:<Guest />,
        children: [
            {
                path: 'login',
                element: <Login />

            },
            {
                path: 'signup',
                element : <Signup />

            },
        ]
    }
])
export default router;