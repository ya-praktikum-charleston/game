import React from "react";
import {BrowserRouter, Route, Switch} from "react-router-dom";
import {
    Signin,
    Signup,
    Profile,
} from "./pages";

const App = () => {

    return (
        <BrowserRouter>
            <div className="App">
                <Switch>
                    <Route path="/signin" component={Signin} />
                    <Route path="/signup" component={Signup} />
                    <Route path="/profile" component={Profile} />
                </Switch>
            </div>
        </BrowserRouter>
    );
};

export default App;
