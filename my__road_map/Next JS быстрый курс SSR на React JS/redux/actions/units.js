export const setUnits = (value) => async dispatch => {
    dispatch({
        type: "SET_UNITS",
        payload: value,
    })
}
