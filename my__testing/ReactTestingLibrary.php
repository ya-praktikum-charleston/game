<?php include '../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#Part1">#1 Установка окружения (Setup Environment)</a></li>
        <li><a class="list-sub__link" href="#Part2">#2 Рендеринг компонента (Rendering a Component)</a></li>
        <li><a class="list-sub__link" href="#Part3">#3 Поисковые типы (Search Types)</a></li>
        <li><a class="list-sub__link" href="#Part4">#4 Поисковые варианты и утверждения (Search Variants & Assertive Functions)</a></li>
        <li><a class="list-sub__link" href="#Part5">#5 fireEvent Событие (Fire Events)</a></li>
        <li><a class="list-sub__link" href="#Part6">#6 userEvent Событие (User Events)</a></li>
        <li><a class="list-sub__link" href="#Part7">#7 Асинхронное тестирование (Asynchronous Testing)</a></li>
        <li><a class="list-sub__link" href="#Part8">#8 Тестирование контекста и портала (Context & Portal Testing)</a></li>
        <li><a class="list-sub__link" href="#Part9">#9 Тестирование Реакт Роутера (React Router Testing)</a></li>
        <li><a class="list-sub__link" href="#Part10">#10 Тестирование Редакса и useReducer (Redux & useReducer Testing)</a></li>
        <li><a class="list-sub__link" href="#Part11">111111111111111111111</a></li>
        <li><a class="list-sub__link" href="#Part12">111111111111111111111</a></li>
    </ul>
</div>


<div class="linear" id="Part1">

    <h2>#1 Установка окружения (Setup Environment)</h2>

    <p>Библиотека интегрирована в React, поэтому устанавливать её не нужно, но если хочется ставь <a href="https://testing-library.com/">https://testing-library.com/</a></p>
    <pre class="brush: js;">
        // установка библиотеки
        npm install --save-dev @testing-library/react
    </pre>

    <pre class="brush: js;">
        // стандартный тест по умолчанию
        test('renders learn react link', () => {
            render(&lt;App /&gt;);
            const linkElement = screen.getByText(/learn react/i);
            expect(linkElement).toBeInTheDocument();
        });
    </pre>

    <p>Тесты запускаются командой <code>npm test</code>.</p>

    <p>Посмотреть охват тестируемых файлов <code>npm test -- --coverage</code></p>

</div>

<div class="linear" id="Part2">
    <h2>#2 Рендеринг компонента (Rendering a Component)</h2>

    <pre class="brush: js;">
        import React, { useState } from &quot;react&quot;;
        import logo from &quot;./logo.svg&quot;;
        import &quot;./App.css&quot;;

        const Search = ({ value, onChange, children }) =&gt; (
        &lt;div&gt;
            &lt;label htmlFor=&quot;search&quot;&gt;{children}&lt;/label&gt;
            &lt;input id=&quot;search&quot; type=&quot;text&quot; value={value} onChange={onChange} /&gt;
        &lt;/div&gt;
        );

        const App = () =&gt; {
        const [search, setSearch] = useState(&quot;&quot;);

        const handleChange = ({ target }) =&gt; {
            setSearch(target.value);
        };

        return (
            &lt;div&gt;
            &lt;Search value={search} onChange={handleChange}&gt;
                Search:
            &lt;/Search&gt;
            &lt;p&gt;Searches for {search ? search : &quot;...&quot;}&lt;/p&gt;
            &lt;/div&gt;
        );
        };

        export default App;
    </pre>
</div>

<div class="linear" id="use_strict">
    <p>Выведем в консоль разметку компонента <code>npm test</code></p>
    <pre class="brush: js;">
        test("renders learn react link", () => {
            render(&lt;App/&gt;);
            screen.debug();
        });
    </pre>
    <p>В консоли увидим:</p>
    <pre class="brush: html;">
        &lt;body&gt;
            &lt;div&gt;
                &lt;div&gt;
                &lt;div&gt;
                    &lt;label
                    for=&quot;search&quot;
                    &gt;
                    Search:
                    &lt;/label&gt;
                    &lt;input
                    id=&quot;search&quot;
                    type=&quot;text&quot;
                    value=&quot;&quot;
                    /&gt;
                &lt;/div&gt;
                &lt;p&gt;
                    Searches for
                    ...
                &lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/body&gt;
    </pre>
</div>

<div class="linear" id="use_strict">
    <p>Работа со снимками</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { render, screen } from &quot;@testing-library/react&quot;;
        import App from &quot;./App&quot;;

        test(&quot;renders learn react link&quot;, () =&gt; {
            const { asFragment } = render(&lt;App /&gt;);
            expect(asFragment(&lt;App /&gt;)).toMatchSnapshot(); //задаём ожидание и оборачиваем в эту функцию App
        });
    </pre>
</div>
    
<div class="linear" id="Part3">
    <h2>#3 Поисковые типы (Search Types)</h2>
    <p><b>Типы выбора элементов, т.е. поиск нужных элементов внутри итоговой разметки</b></p>
    <br>
    <pre class="brush: js;">
        import React, { useState } from &quot;react&quot;;
        import logo from &quot;./logo.svg&quot;;
        import &quot;./App.css&quot;;

        const Search = ({ value, onChange, children }) =&gt; (
        &lt;div&gt;
            &lt;label htmlFor=&quot;search&quot;&gt;{children}&lt;/label&gt;
            &lt;input
            placeholder=&quot;search text...&quot;
            id=&quot;search&quot;
            type=&quot;text&quot;
            value={value}
            onChange={onChange}
            /&gt;
        &lt;/div&gt;
        );

        const App = () =&gt; {
        const [search, setSearch] = useState(&quot;&quot;);

        const handleChange = ({ target }) =&gt; {
            setSearch(target.value);
        };

        return (
            &lt;div&gt;
            &lt;img src=&quot;&quot; alt=&quot;search image&quot; /&gt;
            &lt;Search value={search} onChange={handleChange}&gt;
                SEARCH:
            &lt;/Search&gt;
            &lt;p&gt;Searches for {search ? search : &quot;...&quot;}&lt;/p&gt;
            &lt;/div&gt;
        );
        };

        export default App;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from "react";
        import { render, screen } from "@testing-library/react";
        import App from "./App";

        // глобальная обёртка describe        
        describe("App", () => {
            it("renders App component", ()=> {
                render(&lt;App/&gt;);
                expect(screen.getByText(/Search:/i)).toBeInTheDocument(); // поиск текста
                expect(screen.getByRole('textbox')).toBeInTheDocument();  //Есть ли такая роль
                expect(screen.getByLabelText(/search/i)).toBeInTheDocument();  //Поиск текста в label
                expect(screen.getByPlaceholderText("search text...")).toBeInTheDocument();  //Поиск текста в placeholder
                expect(screen.getByAltText('search image')).toBeInTheDocument();  //Поиск в Alt
                expect(screen.getByDisplayValue('')).toBeInTheDocument();  //Поиск элемента по отображаемому значению, это нужно для проверки defaultValue в input


                // выбрать элемент можно через роли, что бы посмотреть какие есть роли, нужно написать
                screen.getByRole('')    // навести курсор на кавычки и VSC в окне покажет доступные роли
            })
        });  
    </pre>
</div>

<div class="linear" id="Part4">
    <h2>#4 Поисковые варианты и утверждения (Search Variants & Assertive Functions)</h2>
    <br>
    <table>
        <head>
            <tr>
                <th>getBy</th>
                <th>queryBy</th>
                <th>findBy</th>
            </tr>
        </head>
        <body>
            <tr>
                <td>getByText</td>
                <td>queryByText</td>
                <td>findByText</td>
            </tr>
            <tr>
                <td>getByRole</td>
                <td>queryByRole</td>
                <td>findByRole</td>
            </tr>
            <tr>
                <td>getByLabelText</td>
                <td>queryByLabelText</td>
                <td>findByLabelText</td>
            </tr>
            <tr>
                <td>getByPlaceholderText</td>
                <td>queryByPlaceholderText</td>
                <td>findByPlaceholderText</td>
            </tr>
            <tr>
                <td>getByAltText</td>
                <td>queryByAltText</td>
                <td>findByAltText</td>
            </tr>
            <tr>
                <td>getByDisplayText</td>
                <td>queryByDisplayValue</td>
                <td>findByDisplayValue</td>
            </tr>
        </body>
    </table>
    <br>
    
    <p><code>getBy</code> возвращает элемент или ошибку</p>
    <p><code>queryBy</code> возвращает элемент или ошибку после рендера (didMount)</p>
    <p><code>findBy</code> возвращает элемент или ошибку для асинхроннного кода)</p>

    <pre class="brush: js;">
        import React, { useState, useEffect } from &quot;react&quot;;
        import logo from &quot;./logo.svg&quot;;
        import &quot;./App.css&quot;;

        const getUser = () =&gt; Promise.resolve({ id: 1, name: &quot;Yauhen&quot; });

        const Search = ({ value, onChange, children }) =&gt; (
        &lt;div&gt;
            &lt;label htmlFor=&quot;search&quot;&gt;{children}&lt;/label&gt;
            &lt;input
            placeholder=&quot;search text...&quot;
            id=&quot;search&quot;
            type=&quot;text&quot;
            value={value}
            onChange={onChange}
            // required
            /&gt;
        &lt;/div&gt;
        );

        const App = () =&gt; {
        const [search, setSearch] = useState(&quot;&quot;);
        const [user, setUser] = useState(null);

        useEffect(() =&gt; {
            const loadUser = async () =&gt; {
                const user = await getUser();
                setUser(user);
            };

            loadUser();
        }, []);

        const handleChange = ({ target }) =&gt; {
            setSearch(target.value);
        };

        return (
            &lt;div&gt;
            {user &amp;&amp; &lt;h2&gt;Logged in as {user.name}&lt;/h2&gt;}
            &lt;img className=&quot;image&quot; src=&quot;&quot; alt=&quot;search image&quot; /&gt;
            &lt;Search value={search} onChange={handleChange}&gt;
                SEARCH:
            &lt;/Search&gt;
            &lt;p&gt;Searches for {search ? search : &quot;...&quot;}&lt;/p&gt;
            &lt;/div&gt;
        );
        };

        export default App; 
    </pre>
    <p>TEST</p>
    <pre class="brush: js;">
        import React from "react";
        import { render, screen } from "@testing-library/react";
        import App from "./App";

        /*
        Search variants:
        getBy:                    queryby:                    findBy:
        - getByText               - queryByText               - findByText
        - getByRole               - queryByRole               - findByRole
        - getByLabelText          - queryByLabelText          - findByLabelText
        - getByPlaceholderText    - queryByPlaceholderText    - findByPlaceholderText
        - getByAltText            - queryByAltText            - findByAltText
        - getByDisplayValue       - queryByDisplayValue       - findByDisplayValue
        - getAllBy                - queryAllBy                - findAllBy           // если нужно найти несколько элементов
        */

        /*
        Список утверждений (Assertive Functions) используются для проверки наличия элемента
        - toBeDisabled            - toBeEnabled               - toBeEmpty
        - toBeEmptyDOMElement     - toBeInTheDocument         - toBeInvalid
        - toBeRequired            - toBeValid                 - toBeVisible
        - toContainElement        - toContainHTML             - toHaveAttribute
        - toHaveClass             - toHaveFocus               - toHaveFormValues
        - toHaveStyle             - toHaveTextContent         - toHaveValue
        - toHaveDisplayValue      - toBeChecked               - toBePartiallyChecked
        - toHaveDescription
        */

        describe("App", () => {
            it("renders App component", async () => {
                render(<App />);
                // expect(screen.queryByText(/Searches for JavaScript/)).toBeNull();
                expect(screen.queryByText(/Logged in as/)).toBeNull();  // изначально строки нет
                screen.debug();
                expect(await screen.findByText(/Logged in as/)).toBeInTheDocument(); // строка после await появилась
                screen.debug();

                // Assertive Functions Examples:
                // прооверим наличие класса image
                expect( screen.getByAltText(/search image/i) ).toHaveClass('image'); 
        
                // проверить, является ли поле обязательным для заполнения
                expect( screen.getByLabelText(/search/i) ).toBeRequired(); 
                // если не обязательно для заполнения пишем not, а в input нужно убрать required
                expect( screen.getByLabelText(/search/i) ).not.toBeRequired(); 
                
                // до введения значений пустой
                expect( screen.getByLabelText(/search/i) ).toBeEmpty(); 
        
                // убедиться что у поля есть атрибут id
                expect( screen.getByLabelText(/search/i) ).toHaveAttribute('id'); 
            });
        });
    </pre>
</div>

<div class="linear" id="Part5">
    <h2>#5 fireEvent Событие (Fire Events)</h2>

    <pre class="brush: js;">
        import React, { useState, useEffect } from &quot;react&quot;;
        import logo from &quot;./logo.svg&quot;;
        import &quot;./App.css&quot;;

        const getUser = () =&gt; Promise.resolve({ id: 1, name: &quot;Yauhen&quot; });

        const Search = ({ value, onChange, children }) =&gt; (
        &lt;div&gt;
            &lt;label htmlFor=&quot;search&quot;&gt;{children}&lt;/label&gt;
            &lt;input
            placeholder=&quot;search text...&quot;
            id=&quot;search&quot;
            type=&quot;text&quot;
            value={value}
            onChange={onChange}
            // required
            /&gt;
        &lt;/div&gt;
        );

        const App = () =&gt; {
        const [search, setSearch] = useState(&quot;&quot;);
        const [user, setUser] = useState(null);

        useEffect(() =&gt; {
            const loadUser = async () =&gt; {
            const user = await getUser();
            setUser(user);
            };

            loadUser();
        }, []);

        const handleChange = ({ target }) =&gt; {
            setSearch(target.value);
        };

        return (
            &lt;div&gt;
            {user &amp;&amp; &lt;h2&gt;Logged in as {user.name}&lt;/h2&gt;}
            &lt;img className=&quot;image&quot; src=&quot;&quot; alt=&quot;search image&quot; /&gt;
            &lt;Search value={search} onChange={handleChange}&gt;
                SEARCH:
            &lt;/Search&gt;
            &lt;p&gt;Searches for {search ? search : &quot;...&quot;}&lt;/p&gt;
            &lt;/div&gt;
        );
        };

        export default App;
    </pre>
    <br>
    <p>TEST</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { render, screen, fireEvent } from &quot;@testing-library/react&quot;;
        import App from &quot;./App&quot;;

        describe(&quot;App&quot;, () =&gt; {
            test(&quot;renders App component&quot;, async () =&gt; {
                render(&lt;App /&gt;);
                await screen.findByText(/Logged in as/i);
                expect(screen.queryByText(/Searches for React/)).toBeNull();
                fireEvent.change(screen.getByRole(&quot;textbox&quot;), {
                    target: { value: &quot;React&quot; },
                });
                expect(screen.queryByText(/Searches for React/)).toBeInTheDocument();
            });
        });

        describe(&quot;events&quot;, () =&gt; {
            it(&quot;checkbox click&quot;, () =&gt; {
                const handleChange = jest.fn();
                const { container } = render(
                &lt;input type=&quot;checkbox&quot; onChange={handleChange} /&gt;
                );
                const checkbox = container.firstChild;
                expect(checkbox).not.toBeChecked();
                fireEvent.click(checkbox);
                expect(handleChange).toHaveBeenCalledTimes(1);
                expect(checkbox).toBeChecked();
            });

            it(&quot;input focus&quot;, () =&gt; {
                const { getByTestId } = render(
                    &lt;input type=&quot;text&quot; data-testid=&quot;simple-input&quot; /&gt;
                );
                const input = getByTestId(&quot;simple-input&quot;);
                expect(input).not.toHaveFocus();
                input.focus();
                expect(input).toHaveFocus();
            });
        });
    </pre>

</div>

<div class="linear" id="Part6">
   
    <h2>#6 userEvent Событие (User Events)</h2>

    <pre class="brush: js;">
        import React, { useState, useEffect } from &quot;react&quot;;
        import logo from &quot;./logo.svg&quot;;
        import &quot;./App.css&quot;;

        const getUser = () =&gt; Promise.resolve({ id: 1, name: &quot;Yauhen&quot; });

        const Search = ({ value, onChange, children }) =&gt; (
        &lt;div&gt;
            &lt;label htmlFor=&quot;search&quot;&gt;{children}&lt;/label&gt;
            &lt;input
            placeholder=&quot;search text...&quot;
            id=&quot;search&quot;
            type=&quot;text&quot;
            value={value}
            onChange={onChange}
            // required
            /&gt;
        &lt;/div&gt;
        );

        const App = () =&gt; {
        const [search, setSearch] = useState(&quot;&quot;);
        const [user, setUser] = useState(null);

        useEffect(() =&gt; {
            const loadUser = async () =&gt; {
            const user = await getUser();
            setUser(user);
            };

            loadUser();
        }, []);

        const handleChange = ({ target }) =&gt; {
            setSearch(target.value);
        };

        return (
            &lt;div&gt;
            {user &amp;&amp; &lt;h2&gt;Logged in as {user.name}&lt;/h2&gt;}
            &lt;img className=&quot;image&quot; src=&quot;&quot; alt=&quot;search image&quot; /&gt;
            &lt;Search value={search} onChange={handleChange}&gt;
                SEARCH:
            &lt;/Search&gt;
            &lt;p&gt;Searches for {search ? search : &quot;...&quot;}&lt;/p&gt;
            &lt;/div&gt;
        );
        };

        export default App;
    </pre>
    <br>
    <p>TEST</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { render, screen, fireEvent } from &quot;@testing-library/react&quot;;
        import userEvent from &quot;@testing-library/user-event&quot;;
        import App from &quot;./App&quot;;

        describe(&quot;App&quot;, () =&gt; {
        test(&quot;renders App component&quot;, async () =&gt; {
            render(&lt;App /&gt;);
            await screen.findByText(/Logged in as/);
            expect(screen.queryByText(/Searches for React/)).toBeNull();
            // fireEvent.change(screen.getByRole(&quot;textbox&quot;), {
            //   target: { value: &quot;React&quot; },
            // });
            userEvent.type(screen.getByRole(&quot;textbox&quot;), &quot;React&quot;);
            expect(screen.getByText(/Searches for React/)).toBeInTheDocument();
        });
        });

        describe(&quot;events&quot;, () =&gt; {
        it(&quot;checkbox click&quot;, () =&gt; {
            const { container } = render(&lt;input type=&quot;checkbox&quot; /&gt;);
            const checkbox = container.firstChild;
            expect(checkbox).not.toBeChecked();
            // fireEvent.click(checkbox);
            userEvent.click(checkbox);
            // userEvent.click(checkbox, { ctrlKey: true, shiftKey: true });
            expect(checkbox).toBeChecked();
        });

        it(&quot;double click&quot;, () =&gt; {
            const onChange = jest.fn();
            const { container } = render(&lt;input type=&quot;checkbox&quot; onChange={onChange} /&gt;);
            const checkbox = container.firstChild;
            expect(checkbox).not.toBeChecked();
            userEvent.dblClick(checkbox);
            expect(onChange).toHaveBeenCalledTimes(2);
        });

        it(&quot;focus&quot;, () =&gt; {
            const { getAllByTestId } = render(
            &lt;div&gt;
                &lt;input data-testid=&quot;element&quot; type=&quot;checkbox&quot; /&gt;
                &lt;input data-testid=&quot;element&quot; type=&quot;radio&quot; /&gt;
                &lt;input data-testid=&quot;element&quot; type=&quot;number&quot; /&gt;
            &lt;/div&gt;
            );
            const [checkbox, radio, number] = getAllByTestId(&quot;element&quot;);
            userEvent.tab();
            expect(checkbox).toHaveFocus();
            userEvent.tab();
            expect(radio).toHaveFocus();
            userEvent.tab();
            expect(number).toHaveFocus();
        });

        it(&quot;select option&quot;, () =&gt; {
            const { selectOptions, getByRole, getByText } = render(
            &lt;select&gt;
                &lt;option value=&quot;1&quot;&gt;A&lt;/option&gt;
                &lt;option value=&quot;2&quot;&gt;B&lt;/option&gt;
                &lt;option value=&quot;3&quot;&gt;C&lt;/option&gt;
            &lt;/select&gt;
            );

            userEvent.selectOptions(getByRole(&apos;combobox&apos;), &quot;1&quot;);
            expect(getByText(&quot;A&quot;).selected).toBeTruthy();

            userEvent.selectOptions(getByRole(&apos;combobox&apos;), &quot;2&quot;);
            expect(getByText(&quot;B&quot;).selected).toBeTruthy();
            expect(getByText(&quot;A&quot;).selected).toBeFalsy();
        });
        });
    </pre>

</div>

<div class="linear" id="Part7">
   
    <h2>#7 Асинхронное тестирование (Asynchronous Testing)</h2>

    <pre class="brush: js;">
        import React, { useState } from &quot;react&quot;;
        import axios from &quot;axios&quot;;

        const URL = &quot;http://hn.algolia.com/api/v1/search&quot;;

        const App = () =&gt; {
        const [news, setNews] = useState([]);
        const [error, setError] = useState(null);

        const handleFetch = async () =&gt; {
            try {
            const result = await axios.get(`${URL}?query=React`);
            setNews(result.data.hits);
            } catch (error) {
            setError(error);
            }
        };

        return (
            &lt;div&gt;
            &lt;button type=&quot;button&quot; onClick={handleFetch}&gt;
                Fetch News
            &lt;/button&gt;

            {error &amp;&amp; &lt;span&gt;Something went wrong ...&lt;/span&gt;}

            &lt;ul&gt;
                {news.map(({ objectID, url, title }) =&gt; (
                &lt;li key={objectID}&gt;
                    &lt;a href={url}&gt;{title}&lt;/a&gt;
                &lt;/li&gt;
                ))}
            &lt;/ul&gt;
            &lt;/div&gt;
        );
        };

        export default App;
    </pre>
    <br>
    <p>TEST</p>
    <pre class="brush: js;">
        import React from "react";
        import axios from "axios";
        import { render, act } from "@testing-library/react";
        import userEvent from "@testing-library/user-event";
        import App from "./App";

        jest.mock("axios");
        const hits = [
        { objectID: "1", title: "Angular" },
        { objectID: "2", title: "React" },
        ];

        describe("App", () => {
        it("fetches news from an API", async () => {
            axios.get.mockImplementationOnce(() => Promise.resolve({ data: { hits } }));
            const { getByRole, findAllByRole } = render(<App />);
            userEvent.click(getByRole("button"));
            const items = await findAllByRole("listitem");
            expect(items).toHaveLength(2);
            // Additional
            expect(axios.get).toHaveBeenCalledTimes(1);
            expect(axios.get).toHaveBeenCalledWith(
            "http://hn.algolia.com/api/v1/search?query=React"
            );
        });

        it("fetches news from an API and reject", async () => {
            axios.get.mockImplementationOnce(() => Promise.reject(new Error()));
            const { getByRole, findByText } = render(<App />);
            userEvent.click(getByRole("button"));
            const message = await findByText(/Something went wrong/);
            expect(message).toBeInTheDocument();
        });

        it("fetches news from an API (alternative)", async () => {
            const promise = Promise.resolve({ data: { hits } });
            axios.get.mockImplementationOnce(() => promise);
            const { getByRole, getAllByRole } = render(<App />);
            userEvent.click(getByRole("button"));
            await act(() => promise);
            expect(getAllByRole("listitem")).toHaveLength(2);
        });
        });
    </pre>

</div>

<div class="linear" id="Part8">
   
    <h2>#8 Тестирование контекста и портала (Context & Portal Testing)</h2>

    <br>
    <p>Тестирование портала. Портал это элемент который рендерится внутри задаваемого элемента.</p>
    <pre class="brush: js;">
        import React, { useEffect } from &quot;react&quot;;
        import { createPortal } from &quot;react-dom&quot;;
        import { render } from &quot;@testing-library/react&quot;;
        import userEvent from &quot;@testing-library/user-event&quot;;

        const modalRoot = document.createElement(&quot;div&quot;);
        modalRoot.setAttribute(&quot;id&quot;, &quot;modal-root&quot;);
        document.body.appendChild(modalRoot);

        const Modal = ({ onClose, children }) =&gt; {
        const el = document.createElement(&quot;div&quot;);

        useEffect(() =&gt; {
            modalRoot.appendChild(el);
            return () =&gt; modalRoot.removeChild(el);
        });

        return createPortal(
            &lt;div onClick={onClose}&gt;
            &lt;div onClick={(e) =&gt; e.stopPropagation()}&gt;
                {children}
                &lt;button onClick={onClose}&gt;Close&lt;/button&gt;
            &lt;/div&gt;
            &lt;/div&gt;,
            el
        );
        };

        describe(&quot;Portal&quot;, () =&gt; {
            it(&quot;modal shows the children and a close button&quot;, () =&gt; {
                const handleClose = jest.fn();
                const { getByText } = render(
                &lt;Modal onClose={handleClose}&gt;
                    &lt;div&gt;My portal&lt;/div&gt;
                &lt;/Modal&gt;
                );
                expect(getByText(&quot;My portal&quot;)).toBeInTheDocument();
                userEvent.click(getByText(/close/i));
                expect(handleClose).toHaveBeenCalledTimes(1);
            });

            it(&quot;should be unmounted&quot;, () =&gt; {
                const { getByText, unmount, queryByText } = render(
                &lt;Modal&gt;
                    &lt;div&gt;My portal&lt;/div&gt;
                &lt;/Modal&gt;
                );
                expect(getByText(&quot;My portal&quot;)).toBeInTheDocument();
                unmount();
                expect(queryByText(&quot;My portal&quot;)).not.toBeInTheDocument();
            });
        });
    </pre>
    <br>
    <p>Тестирование контекста. Контекст это нативный механизм React который с помощью элементов <code>Consumer</code> и <code>Provider</code> позволяет пробрасывать <code>props</code> через несколько уровней напрямую в компонент.</p>
    <pre class="brush: js;">
        import React, { useState, useContext, createContext } from &quot;react&quot;;
        import { render } from &quot;@testing-library/react&quot;;
        import userEvent from &quot;@testing-library/user-event&quot;;

        const AuthContext = createContext();

        const AuthProvider = ({ children }) =&gt; {
        const [isLoggedIn, toggleLoginStatus] = useState(false);

        const toggleLogin = () =&gt; {
            toggleLoginStatus(!isLoggedIn);
        };

        return (
            &lt;AuthContext.Provider value={{ toggleLogin, isLoggedIn }}&gt;
            &lt;div&gt;Message: {children}&lt;/div&gt;
            &lt;/AuthContext.Provider&gt;
        );
        };

        const ConsumerComponent = () =&gt; {
        const { isLoggedIn, toggleLogin } = useContext(AuthContext);

        return (
            &lt;&gt;
            &lt;input type=&quot;button&quot; value=&quot;Login&quot; onClick={toggleLogin} /&gt;
            {isLoggedIn ? &quot;Welcome!&quot; : &quot;Please, log in&quot;}
            &lt;/&gt;
        );
        };

        describe(&quot;Context&quot;, () =&gt; {
            it(&quot;ConsumerComponent shows default value&quot;, () =&gt; {
                const { getByText } = render(
                &lt;AuthProvider&gt;
                    &lt;ConsumerComponent /&gt;
                &lt;/AuthProvider&gt;
                );
                expect(getByText(/^Message:/)).toHaveTextContent(&quot;Message: Please, log in&quot;);
            });

            it(&quot;ConsumerComponent toggle value&quot;, () =&gt; {
                const { getByText, getByRole } = render(
                &lt;AuthProvider&gt;
                    &lt;ConsumerComponent /&gt;
                &lt;/AuthProvider&gt;
                );
                expect(getByText(/^Message:/)).toHaveTextContent(&quot;Message: Please, log in&quot;);
                userEvent.click(getByRole(&quot;button&quot;));
                expect(getByText(/^Message:/)).toHaveTextContent(&quot;Message: Welcome!&quot;);
                userEvent.click(getByRole(&quot;button&quot;));
                expect(getByText(/^Message:/)).toHaveTextContent(&quot;Message: Please, log in&quot;);
            });
        });
    </pre>

</div>

<div class="linear" id="Part9">
   
    <h2>#9 Тестирование Реакт Роутера (React Router Testing)</h2>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { withRouter } from &quot;react-router&quot;;
        import { Link, Route, Router, Switch, useParams } from &quot;react-router-dom&quot;;
        import { createMemoryHistory } from &quot;history&quot;;
        import { render, fireEvent } from &quot;@testing-library/react&quot;;

        const Home = () =&gt; &lt;h1&gt;Home page&lt;/h1&gt;;
        const About = () =&gt; &lt;h1&gt;About page&lt;/h1&gt;;
        const Error = () =&gt; &lt;h1&gt;404 Error&lt;/h1&gt;;

        const Contact = () =&gt; {
        const { name } = useParams();
        return &lt;h1 data-testid=&quot;contact-name&quot;&gt;{name}&lt;/h1&gt;;
        };

        const LocationDisplay = withRouter(({ location }) =&gt; (
        &lt;div data-testid=&quot;location-display&quot;&gt;{location.pathname}&lt;/div&gt;
        ));

        const NAME = &quot;John Doe&quot;;

        const RouterComponent = () =&gt; (
            &lt;&gt;
                &lt;nav data-testid=&quot;navbar&quot;&gt;
                &lt;Link data-testid=&quot;home-link&quot; to=&quot;/&quot;&gt;
                    Home
                &lt;/Link&gt;
                &lt;Link data-testid=&quot;about-link&quot; to=&quot;/about&quot;&gt;
                    About
                &lt;/Link&gt;
                &lt;Link data-testid=&quot;contact-link&quot; to={`/contact/${NAME}`}&gt;
                    Contact
                &lt;/Link&gt;
                &lt;/nav&gt;

                &lt;Switch&gt;
                &lt;Route exact path=&quot;/&quot; component={Home} /&gt;
                &lt;Route path=&quot;/about&quot; component={About} /&gt;
                &lt;Route path=&quot;/contact:name&quot; component={Contact} /&gt;
                &lt;Route component={Error} /&gt;
                &lt;/Switch&gt;

                &lt;LocationDisplay /&gt;
            &lt;/&gt;
        );

        const renderWithRouter = (
        component,
        {
            route = &quot;/&quot;,
            history = createMemoryHistory({ initialEntries: [route] }),
        } = {}
        ) =&gt; {
        const Wrapper = ({ children }) =&gt; (
            &lt;Router history={history}&gt;{children}&lt;/Router&gt;
        );
        return {
            ...render(component, { wrapper: Wrapper }),
            history,
        };
        };

        describe(&quot;React Router&quot;, () =&gt; {
            it(&quot;should render the home page&quot;, () =&gt; {
                // const history = createMemoryHistory();
                // const { container, getByTestId } = render(
                //   &lt;Router history={history}&gt;
                //     &lt;RouterComponent /&gt;
                //   &lt;/Router&gt;
                // );
                const { container, getByTestId } = renderWithRouter(&lt;RouterComponent /&gt;);
                const navbar = getByTestId(&quot;navbar&quot;);
                const link = getByTestId(&quot;home-link&quot;);
                expect(container.innerHTML).toMatch(&quot;Home page&quot;);
                expect(navbar).toContainElement(link);
            });

            it(&quot;should navigate to the contact page&quot;, () =&gt; {
                // const history = createMemoryHistory();
                // const { container, getByTestId } = render(
                //   &lt;Router history={history}&gt;
                //     &lt;RouterComponent /&gt;
                //   &lt;/Router&gt;
                // );
                const { container, getByTestId } = renderWithRouter(&lt;RouterComponent /&gt;);
                fireEvent.click(getByTestId(&quot;contact-link&quot;));
                expect(container.innerHTML).toMatch(&quot;John Doe&quot;);
            });

            it(&quot;should navigate to error page if route is wrong&quot;, () =&gt; {
                // const history = createMemoryHistory();
                // history.push(&quot;/wrong-route&quot;);
                // const { container } = render(
                //   &lt;Router history={history}&gt;
                //     &lt;RouterComponent /&gt;
                //   &lt;/Router&gt;
                // );
                const { container } = renderWithRouter(&lt;RouterComponent /&gt;, {
                route: &quot;/wrong-route&quot;,
                });
                expect(container.innerHTML).toMatch(&quot;404 Error&quot;);
            });

            it(&quot;rendering a component that uses withRouter&quot;, () =&gt; {
                // const history = createMemoryHistory();
                // const route = &quot;/some-route&quot;;
                // history.push(route);
                // const { getByTestId } = render(
                //   &lt;Router history={history}&gt;
                //     &lt;LocationDisplay /&gt;
                //   &lt;/Router&gt;
                // );
                const route = &quot;/some-route&quot;;
                const { getByTestId } = renderWithRouter(&lt;LocationDisplay /&gt;, { route });
                expect(getByTestId(&quot;location-display&quot;)).toHaveTextContent(route);
            });
        });
    </pre>
    
</div>

<div class="linear" id="Part10">
   
    <h2>#10 Тестирование Редакса и useReducer (Redux & useReducer Testing)</h2>

    <p><b>Тестирование Редакса</b></p>
    <p>Компонент</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { connect } from &quot;react-redux&quot;;

        const TestRedux = ({ counter, dispatch }) =&gt; {
            const increment = () =&gt; dispatch({ type: &quot;INCREMENT&quot; });
            const decrement = () =&gt; dispatch({ type: &quot;DECREMENT&quot; });

            return (
                &lt;&gt;
                &lt;h1&gt;{counter}&lt;/h1&gt;
                &lt;button onClick={increment}&gt;+1&lt;/button&gt;
                &lt;button onClick={decrement}&gt;-1&lt;/button&gt;
                &lt;/&gt;
            );
        };

        export default connect((state) =&gt; ({ counter: state.count }))(TestRedux); 
    </pre>
    <br>
    <p>Редюсер</p>
    <pre class="brush: js;">
        export const initialState = {
            count: 0,
        };

        export const reducer = (state = initialState, action) => {
            switch (action.type) {
                case "INCREMENT":
                return {
                    count: state.count + 1,
                };
                case "DECREMENT":
                return {
                    count: state.count - 1,
                };
                default:
                return state;
            }
        };
    </pre>
    <br>
    <p>TEST</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { createStore } from &quot;redux&quot;;
        import { Provider } from &quot;react-redux&quot;;
        import { render } from &quot;@testing-library/react&quot;;
        import userEvent from &quot;@testing-library/user-event&quot;;

        import { reducer } from &quot;./reducer&quot;;
        import TestRedux from &quot;./TestRedux&quot;;

        const renderWithRedux = (
        component,
        { initialState, store = createStore(reducer, initialState) } = {}
        ) =&gt; {
            return {
                ...render(&lt;Provider store={store}&gt;{component}&lt;/Provider&gt;),
                store,
            };
        };

        describe(&quot;Redux testing&quot;, () =&gt; {
            it(&quot;checks initial state is equal to 0&quot;, () =&gt; {
                const { getByRole } = renderWithRedux(&lt;TestRedux /&gt;);
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;0&quot;);
            });

            it(&quot;increments the counter through redux&quot;, () =&gt; {
                const { getByRole, getByText } = renderWithRedux(&lt;TestRedux /&gt;, {
                initialState: { count: 5 },
                });
                userEvent.click(getByText(&quot;+1&quot;));
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;6&quot;);
            });

            it(&quot;decrements the counter through redux&quot;, () =&gt; {
                const { getByRole, getByText } = renderWithRedux(&lt;TestRedux /&gt;, {
                initialState: { count: 100 },
                });
                userEvent.click(getByText(&quot;-1&quot;));
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;99&quot;);
            });
        });
    </pre>

    <br>
    <p><b>Тестирование useReducer</b></p>
    
    <pre class="brush: js;">
        import React, { useReducer } from &quot;react&quot;;
        import { render } from &quot;@testing-library/react&quot;;
        import userEvent from &quot;@testing-library/user-event&quot;;

        const initialState = { count: 0 };

        const reducer = ({ count }, { type }) =&gt; {
        switch (type) {
            case &quot;INCREMENT&quot;:
            return { count: count + 1 };
            case &quot;DECREMENT&quot;:
            return { count: count - 1 };
            default:
            return {};
        }
        };

        const Counter = () =&gt; {
        const [state, dispatch] = useReducer(reducer, initialState);

        return (
            &lt;&gt;
            &lt;h1&gt;{state.count}&lt;/h1&gt;
            &lt;button onClick={() =&gt; dispatch({ type: &quot;INCREMENT&quot; })}&gt;+1&lt;/button&gt;
            &lt;button onClick={() =&gt; dispatch({ type: &quot;DECREMENT&quot; })}&gt;-1&lt;/button&gt;
            &lt;/&gt;
        );
        };

        describe(&quot;useReducer&quot;, () =&gt; {
            it(&quot;hook testing&quot;, () =&gt; {
                const { getByText, getByRole } = render(&lt;Counter /&gt;);
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;0&quot;);
                userEvent.click(getByText(&quot;+1&quot;));
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;1&quot;);
                userEvent.click(getByText(&quot;-1&quot;));
                expect(getByRole(&quot;heading&quot;)).toHaveTextContent(&quot;0&quot;);
            });
        });
    </pre>

</div>



&lt;App/&gt;
<div class="linear" id="use_strict">
    <p><b>Пользовательские матчеры</b></p>

    <p><a href="https://github.com/testing-library/jest-dom#installation" target="_blank">gitHub jest-dom</a></p>

    <p><code>@testing-library/jest-dom</code> может работать с любой библиотекой или фреймворком, 
    который возвращает Элементы DOM из запросов. Приведенные ниже примеры пользовательских сопоставителей написаны с 
    использованием сопоставителей из <code>@testing-library</code> набора библиотек s (например <code>getByTestId</code>, <code>queryByTestId</code>, <code>getByText</code>, и т. д.)</p>

    <p>Примеры:</p>

    <pre class="brush: html;">
        &lt;button data-testid=&quot;button&quot; type=&quot;submit&quot; disabled&gt;submit&lt;/button&gt;
        &lt;fieldset disabled&gt;&lt;input type=&quot;text&quot; data-testid=&quot;input&quot; /&gt;&lt;/fieldset&gt;
        &lt;a href=&quot;...&quot; disabled&gt;link&lt;/a&gt;
    </pre>

    <pre class="brush: js;">
        expect(getByTestId('button')).toBeDisabled()
        expect(getByTestId('input')).toBeDisabled()
        expect(getByText('link')).not.toBeDisabled()
    </pre>

    <br>

    <pre class="brush: js;">
        // Методы
        getByText // содержит полную разметку приложения
        getByRole // роли элементов


        // Пользовательские матчеры
        expect // утверждение
        toBeInTheDocument   // позволяет утверждать, присутствует ли элемент в документе или нет.
    </pre>
</div>



<?php include '../include/footer.php'; ?>
