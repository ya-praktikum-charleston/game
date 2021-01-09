<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">

    <p><code>useDispatch</code> - получение функции <code>store.dispatch</code> в компоненте. Раньше для вызова <code>action</code> функциональный компонент приходилось оборачивать в вызов <code>connect</code>:</p>

    <pre class="brush: js;">
        const Foo = ({ dispatch }) => {
            const handler = useCallback(() => {
                dispatch(action());
            }, []);

            return (
                &lt;Bar onClick={handler} /&gt;
            );
        };

        export default connect()(Foo);


        // Сейчас:
        const Foo = () => {
            const dispatch = useDispatch();

            const handler = useCallback(() => {
                dispatch(action());
            }, []);

            return (
                &lt;Bar onClick={handler} /&gt;
            );
        };

        export default Foo;
    </pre>

</div>

<div class="linear" id="use_strict">

    <p><code>useSelector</code> - маппинг значения из <code>store</code>.</p>

    <pre class="brush: js;">
        const Foo = ({ value }) => {
            return (
                &lt;Bar value={value} /&gt;
            );
        };

        const mapStateToProps = state => ({
            value: state.value,
        });

        export default connect(mapStateToProps)(Foo);


        // Сейчас:
        const Foo = () => {
            const value = useSelector(state => state.value);

            return (
                &lt;Bar value={value} /&gt;
            );
        };

        export default Foo;
    </pre>

</div>

<div class="linear" id="use_strict">

    <p><code>useStore</code> - получение <code>store</code> целиком:</p>

    <pre class="brush: js;">
        const valueSelector = state => state.value;

        const Foo = () => {
            const { dispatch, getState, subscribe } = useStore();
            const value = valueSelector(getState());

            useEffect(() => subscribe(console.log), []);

            const handler = useCallback(() => {
                dispatch(action());
            }, []);

            return (
                &lt;Bar onClick={handler} value={value} /&gt;
            );
        };

        export default Foo;
    </pre>

</div>


<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
