const initialState = {
    units: null,
};

const reduserUsers = (state = initialState, action) => {
    switch (action.type) {
        case "SET_UNITS":
            return {
                ...state,
                units: action.payload,
            };
        default:
            return state;
    }
};

export default reduserUsers;
