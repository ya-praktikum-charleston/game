<?php include '../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#Part1">#1 Теория тестирования (Testing Basics)</a></li>
        <li><a class="list-sub__link" href="#Part2">#2 Установка окружения (Setup Environment)</a></li>
        <li><a class="list-sub__link" href="#Part3">#3 Тестирование отрисовки (Testing Rendering)</a></li>
        <li><a class="list-sub__link" href="#Part4">#4 Тестирование снимков (Snapshot Testing)</a></li>
        <li><a class="list-sub__link" href="#Part5">#5 Тестирование пропсов (Testing Props)</a></li>
        <li><a class="list-sub__link" href="#Part6">#6 Тестирование событий изменения (Testing Change Events)</a></li>
        <li><a class="list-sub__link" href="#Part7">#7 Тестирование событий клика (Testing Click Events)</a></li>
        <li><a class="list-sub__link" href="#Part8">#8 Тестирование методов жизненного цикла (Lifecycle Methods Testing)</a></li>
        <li><a class="list-sub__link" href="#Part9">#9 Тестирование асинхронных запросов (Testing & Mocking Fetch)</a></li>
        <li><a class="list-sub__link" href="#Part10">#10 Полное тестирование снимками (Full Snapshot Testing)</a></li>
        <li><a class="list-sub__link" href="#Part11">#11 Тестирование утилит (Utils Testing)</a></li>
        <li><a class="list-sub__link" href="#Part12">#12 Тестирование контекста и портала (Context & Portal Testing)</a></li>
    </ul>
</div>

<div class="linear" id="Part1">

    <h2>Jest & Enzyme <br>#1 Теория тестирования (Testing Basics)</h2>

    <p><code>TDD</code> - это написание тестов, а потом на основании тестов написание логики</p>
    <p><code>BDD</code> - это тоже самое, только основывается на бизнес логике и исходя из неё пишутся тесты а затем логика</p>

    <p><b>Типы тестирования (пирамида тестирования)</b></p>

    <p><code>End-to-End (E2E)</code> - проверяется работа всего приложения или фактически описанные ранее бизней кейсы</p>
    <p><code>Integration Testing</code> - проверяется взаимодействие созданного модуля с другими т.е. не сломала ли новая логика что то за её пределами</p>
    <p><code>Unit Testing</code> - это по сути проверка логики инкапсулированного модуля (компонента) или юнита</p>

    <p><code>Stub & Mock</code> - оба определения связаны с подменой данных</p>

    <pre class="brush: js;">
        // устноака jest
        npm install --save-dev jest

        // устноака enzyme
        npm i --save-dev enzyme enzyme-adapter-react-16


        {
            "scripts": {
                "test": "jest",
                "test:watch": "jest --watch",       // запускает слежение за тестами
                "test:coverage": "jest --coverage"
            },
            "devDependencies": {
                "enzyme": "^3.11.0",
                "enzyme-adapter-react-16": "^1.15.2",
                "enzyme-to-json": "^3.5.0",
                "identity-obj-proxy": "^3.0.0",
                "jest": "^26.0.1"
            },
            "jest": {
                "verbose": true,
                "clearMocks": true,
                "collectCoverage": true,
                "setupFilesAfterEnv": [
                  "./config/setupTest.js"
                ],
                "snapshotSerializers": [
                  "./node_modules/enzyme-to-json/serializer"
                ],
                "transform": {
                  "^.+\\.js$": "babel-jest"
                },
                "moduleNameMapper": {
                  "\\.(jpg|jpeg|png|gif|eot|otf|webp|svg|ttf|woff|woff2|mp4|webm|wav|mp3|m4a|aac|oga)$": "./__mocks__/fileMock.js",
                  "\\.(css|scss)$": "identity-obj-proxy"
                }
            }
        }

        // плюс файлы
        .editorconfig
        babel.config.js
    </pre>

</div>

<div class="linear" id="Part2">
    <h2>#2 Установка окружения (Setup Environment)</h2>

    <p><b>Пример тестирования компонента</b></p>
    <p><b>Файл компонента <code>post.js</code></b></p>

    <pre class="brush: js;">
        import React from "react";
        import PropTypes from "prop-types";

        const Post = ({ author, created_at, num_comments, title, points, url }) => (
          &lt;li className=&quot;post&quot;&gt;
            &lt;div className=&quot;description&quot;&gt;
              &lt;a href={url} className=&quot;title&quot;&gt;
                {title}
              &lt;/a&gt;
              &lt;span className=&quot;text&quot;&gt;{`${points} points`}&lt;/span&gt;
              &lt;span className=&quot;comments&quot;&gt;{`${num_comments} comments`}&lt;/span&gt;
              &lt;span className=&quot;date&quot;&gt;
                {created_at ? new Date(created_at).toLocaleDateString() : &quot;No date&quot;}
              &lt;/span&gt;
              &lt;span className=&quot;author&quot;&gt;{author}&lt;/span&gt;
            &lt;/div&gt;
          &lt;/li&gt;
        );

        Post.propTypes = {
          author: PropTypes.string,
          created_at: PropTypes.string,
          num_comments: PropTypes.number,
          title: PropTypes.string,
          points: PropTypes.number,
          url: PropTypes.string,
        };

        Post.defaultProps = {
          author: "Yauhen",
          created_at: "",
          num_comments: 0,
          title: "Here should be a title",
          points: 0,
          url: "#",
        };

        export default Post;

    </pre>
    <br>
    <p><b>Файл теста <code>post.spec.js</code></b></p>

    <pre class="brush: js;">
        import React from "react";
        import Post from "./post";

        const setUp = (props) => shallow(&lt;Post {...props} /&gt;);

        describe("should render Post component", () => {
          let component;
          beforeEach(() => {
            component = setUp();
          });

          it("should contain .post wrapper", () => {
            const wrapper = component.find(".post");
            expect(wrapper.length).toBe(1);
          });

          it("should contain link", () => {
            const wrapper = component.find("a");
            expect(wrapper.length).toBe(1);
          });

          it("should render created date", () => {
            const created_at = "01-03-2020";
            component = setUp({ created_at });
            const date = component.find(".date");
            expect(date.text()).toBe(new Date(created_at).toLocaleDateString());
          });
        });
    </pre>

</div>

<div class="linear" id="Part3">
    <h2>#3 Тестирование отрисовки (Testing Rendering)</h2>

    <p><b>Пример, папка Posts</b></p>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import PropTypes from &quot;prop-types&quot;;

        const Post = ({ author, created_at, num_comments, title, points, url }) =&gt; (
            &lt;li className=&quot;post&quot;&gt;
              &lt;div className=&quot;description&quot;&gt;
                &lt;a href={url} className=&quot;title&quot;&gt;
                  {title}
                &lt;/a&gt;
                &lt;span className=&quot;text&quot;&gt;{`${points} points`}&lt;/span&gt;
                &lt;span className=&quot;comments&quot;&gt;{`${num_comments} comments`}&lt;/span&gt;
                &lt;span className=&quot;date&quot;&gt;
                  {created_at ? new Date(created_at).toLocaleDateString() : &quot;No date&quot;}
                &lt;/span&gt;
                &lt;span className=&quot;author&quot;&gt;{author}&lt;/span&gt;
              &lt;/div&gt;
            &lt;/li&gt;
        );

        Post.propTypes = {
            author: PropTypes.string,
            created_at: PropTypes.string,
            num_comments: PropTypes.number,
            title: PropTypes.string,
            points: PropTypes.number,
            url: PropTypes.string,
        };

        Post.defaultProps = {
            author: &quot;Yauhen&quot;,
            created_at: &quot;&quot;,
            num_comments: 0,
            title: &quot;Here should be a title&quot;,
            points: 0,
            url: &quot;#&quot;,
        };

        export default Post;
        </pre>
    <br>
    <p>Тест</p>
    <pre class="brush: js;">
          import React from "react";
          import Post from "./post";

          const setUp = (props) => shallow(<Post {...props}/>);

          describe("should render Post component", () => {
            let component;
            beforeEach(() => {
              component = setUp();
            });

            it("should contain .post wrapper", () => {
              const wrapper = component.find(".post");
              expect(wrapper.length).toBe(1);
            });

            it("should contain link", () => {
              const wrapper = component.find("a");
              expect(wrapper.length).toBe(1);
            });

            it("should render created date", () => {
              const created_at = "01-03-2020";
              component = setUp({ created_at });
              const date = component.find(".date");
              expect(date.text()).toBe(new Date(created_at).toLocaleDateString());
            });
          });

    </pre>

</div>

<div class="linear" id="Part4">
    <h2>#4 Тестирование снимков (Snapshot Testing)</h2>

    <p>Если в процессе снимок обновился нужно указать <code>npm test -u</code></p>

    <p><b>Пример, папка Posts</b></p>

    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;

        import Post from &quot;../Post/post&quot;;

        const NEWS = [
          {
            author: &quot;Yauhen&quot;,
            created_at: &quot;2020-05-03T23:36:09.816Z&quot;,
            num_comments: 10,
            objectID: 1,
            title: &quot;Jest &amp; Enzyme&quot;,
            points: 100,
            url: &quot;//test.url&quot;,
          },
          {
            author: &quot;Stepan&quot;,
            created_at: &quot;2020-05-05T23:36:09.816Z&quot;,
            num_comments: 8,
            objectID: 2,
            title: &quot;TypeScript Basics&quot;,
            points: 10,
            url: &quot;//test2121.url&quot;,
          },
        ];

        const Posts = () =&gt; (
          &lt;ul className=&quot;newsList&quot;&gt;
            {NEWS.map(
                ({ author, created_at, num_comments, objectID, title, points, url }) =&gt; (
                    &lt;Post
                      key={objectID}
                      author={author}
                      created_at={created_at}
                      num_comments={num_comments}
                      title={title}
                      points={points}
                      url={url}
                    /&gt;
              )
            )}
          &lt;/ul&gt;
        );

        export default Posts;
    </pre>
    <br>
    <p>Тест</p>
    <pre class="brush: js;">
    import React from "react";
import Posts from "./posts";

describe("Posts component", () => {
  it("should render Post component", () => {
    const component = render(<Posts />);
    expect(component).toMatchSnapshot();
  });
});

    </pre>

</div>

<div class="linear" id="Part5">
    <h2>#5 Тестирование пропсов (Testing Props)</h2>

    <p>Папки title и select</p>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import PropTypes from &amp;quot;prop-types&amp;quot;;

        const Title = ({ title }) =&amp;gt; &amp;lt;h1 className=&amp;quot;title&amp;quot;&amp;gt;{title}&amp;lt;/h1&amp;gt;;

        Title.propTypes = {
          title: PropTypes.string,
        };

        Title.defaultProps = {
          title: &amp;quot;Simple title&amp;quot;,
        };

        export default Title;
            &lt;/pre&gt;
            &lt;br&gt;
            &lt;p&gt;Тест&lt;/p&gt;
            &lt;pre class=&quot;brush: js;&quot;&gt;
            import React from &amp;quot;react&amp;quot;;
        import Title from &amp;quot;./title&amp;quot;;

        describe(&amp;quot;Title component&amp;quot;, () =&amp;gt; {
          it(&amp;quot;should render Title component with props&amp;quot;, () =&amp;gt; {
            const component = shallow(&amp;lt;Title title=&amp;quot;Test title&amp;quot; /&amp;gt;);
            expect(component).toMatchSnapshot();
          });

          it(&amp;quot;should render Title component without props&amp;quot;, () =&amp;gt; {
            const component = shallow(&amp;lt;Title /&amp;gt;);
            expect(component).toMatchSnapshot();
          });
        });
            &lt;/pre&gt;

            &lt;br&gt;
            &lt;p&gt;&lt;b&gt;Второй пример:&lt;/b&gt;&lt;/p&gt;
            &lt;pre class=&quot;brush: js;&quot;&gt;
            import React from &amp;quot;react&amp;quot;;
        import PropTypes from &amp;quot;prop-types&amp;quot;;

        const Input = ({ handleChange, options, value }) =&amp;gt; (
          &amp;lt;div className=&amp;quot;selectWrapper&amp;quot;&amp;gt;
            {options.length &amp;gt; 0 ? (
              &amp;lt;&amp;gt;
                &amp;lt;select onChange={handleChange} defaultValue={value}&amp;gt;
                  {options.map(({ value, label }) =&amp;gt; (
                    &amp;lt;option key={value} value={value}&amp;gt;
                      {label}
                    &amp;lt;/option&amp;gt;
                  ))}
                &amp;lt;/select&amp;gt;
                &amp;lt;span className=&amp;quot;selectText&amp;quot;&amp;gt;per page&amp;lt;/span&amp;gt;
              &amp;lt;/&amp;gt;
            ) : (
              &amp;lt;div className=&amp;quot;placeholder&amp;quot;&amp;gt;&amp;quot;No items&amp;quot;&amp;lt;/div&amp;gt;
            )}
          &amp;lt;/div&amp;gt;
        );

        Input.propTypes = {
          handleChange: PropTypes.func,
          options: PropTypes.array,
          value: PropTypes.number,
        };

        Input.defaultProps = {
          handleChange: () =&amp;gt; &amp;apos;Test&amp;apos;,
          options: [],
          value: 0,
        };

        export default Input;
            &lt;/pre&gt;
            &lt;br&gt;
            &lt;p&gt;Тест&lt;/p&gt;
            &lt;pre class=&quot;brush: js;&quot;&gt;
            import React from &quot;react&quot;;
        import Select from &quot;./select&quot;;
        import { shallow } from &quot;enzyme&quot;;

        const props = {
          options: [
            { value: &quot;text_1&quot;, label: &quot;Test 1&quot; },
            { value: &quot;text_2&quot;, label: &quot;Test 2&quot; },
          ],
          value: 0,
          handleChange: () =&gt; {},
        };

        const setUp = (props) =&gt; shallow(&lt;Select {...props} /&gt;);

        describe(&quot;Select component&quot;, () =&gt; {
          describe(&quot;Has props&quot;, () =&gt; {
            const component = setUp(props);

            it(&quot;should render select element&quot;, () =&gt; {
              const select = component.find(&quot;select&quot;);
              expect(select).toHaveLength(1);
            });

            it(&quot;should render 2 options&quot;, () =&gt; {
              const options = component.find(&quot;option&quot;);
              expect(options).toHaveLength(2);
            });
          });

          describe(&quot;Has no props&quot;, () =&gt; {
            it(&quot;should render placeholder&quot;, () =&gt; {
              const component = shallow(&lt;Select /&gt;);
              const placeholder = component.find(&quot;.placeholder&quot;);
              expect(placeholder).toHaveLength(1);
            });
          });

          describe(&quot;defaultProps&quot;, () =&gt; {
            it(&quot;should use default handleChange&quot;, () =&gt; {
              const result = Select.defaultProps.handleChange();
              expect(result).toBe('Test');
            });
          });
        });
    </pre>

</div>

<div class="linear" id="Part6">
    <h2>#6 Тестирование событий и обработчиков событий (Testing Change Events)</h2>

    <p>Папки Input и Posts</p>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import PropTypes from &quot;prop-types&quot;;

        const Input = ({ onChange, value, onKeyPress }) =&gt; (
          &lt;div className=&quot;inputWrapper&quot;&gt;
            &lt;i className=&quot;fas fa-search&quot; /&gt;
            &lt;input
              className=&quot;input&quot;
              placeholder=&quot;Click to search&quot;
              onChange={onChange}
              onKeyPress={onKeyPress}
              value={value}
            /&gt;
          &lt;/div&gt;
        );

        Input.propTypes = {
          onChange: PropTypes.func,
          onKeyPress: PropTypes.func,
          value: PropTypes.string,
        };

        Input.defaultProps = {
          onChange: () =&gt; {},
          onKeyPress: () =&gt; {},
          value: &quot;&quot;,
        };

        export default Input;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import Input from &quot;./input&quot;;

        describe(&quot;Input component&quot;, () =&gt; {
          it(&quot;should render Input component&quot;, () =&gt; {
            const component = shallow(&lt;Input /&gt;);
            expect(component).toMatchSnapshot();
          });

          describe(&quot;defaultProps&quot;, () =&gt; {
            it(&quot;should use default onChange&quot;, () =&gt; {
              const result = Input.defaultProps.onChange();
              expect(result).toBe(undefined);
            });

            it(&quot;should use default onKeyPress&quot;, () =&gt; {
              const result = Input.defaultProps.onKeyPress();
              expect(result).toBe(undefined);
            });
          });
        });
    </pre>

</div>

<div class="linear" id="Part7">
    <h2>#7 Тестирование событий клика (Testing Click Events)</h2>

    <p>Папки Counter и Button</p>

    <p>Первый пример</p>
    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;

        class CounterButton extends Component {
          state = {
            count: 0,
          };

          handleClick = () =&gt; {
            this.setState(({ count }) =&gt; ({
              count: ++count,
            }));
          };

          handleReset = (count) =&gt; {
            this.setState({ count });
          };

          render() {
            return (
              &lt;div&gt;
                &lt;div&gt;{this.state.count}&lt;/div&gt;
                &lt;button className=&quot;plusOneBtn&quot; onClick={this.handleClick}&gt;
                  +1
                &lt;/button&gt;
                &lt;button className=&quot;resetBtn&quot; onClick={() =&gt; this.handleReset(10)}&gt;
                  Reset to 10
                &lt;/button&gt;
              &lt;/div&gt;
            );
          }
        }

        export default CounterButton;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import Counter from &quot;./counter&quot;;

        const setUp = () =&gt; shallow(&lt;Counter /&gt;);

        describe(&quot;Count component&quot;, () =&gt; {
          let component;
          let instance;
          beforeEach(() =&gt; {
            component = setUp();
            instance = component.instance();
          });

          it(&quot;should render Counter component&quot;, () =&gt; {
            expect(component).toMatchSnapshot();
          });

          describe(&quot;Counter handlers&quot;, () =&gt; {
            it(&quot;should change count value to plus 1&quot;, () =&gt; {
              const btn = component.find(&quot;.plusOneBtn&quot;);
              btn.simulate(&quot;click&quot;);
              // expect(component).toMatchSnapshot();
              expect(component.state().count).toBe(1);
            });

            it(&quot;should reset count value to 10&quot;, () =&gt; {
              const btn = component.find(&quot;.resetBtn&quot;);
              btn.simulate(&quot;click&quot;);
              expect(component.state().count).toBe(10);
            });

            it(&quot;should reset count value to custom value&quot;, () =&gt; {
              instance.handleReset(20);
              expect(component.state().count).toBe(20);
            });
          });
        });
    </pre>
    <br>
    <p>Второй пример</p>
    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;
        import PropTypes from &quot;prop-types&quot;;

        class Button extends Component {
          handleClick = () =&gt; {
            const { onClick } = this.props;
            onClick();
          };

          render() {
            return (
              &lt;button className=&quot;btn&quot; onClick={this.handleClick}&gt;
                {this.props.label}
              &lt;/button&gt;
            );
          }
        }

        Button.propTypes = {
          onClick: PropTypes.func.isRequired,
          label: PropTypes.string,
        };

        Button.defaultProps = {
          label: &quot;Button&quot;,
        };

        export default Button;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from "react";
        import Button from "./button";

        describe("Button component", () => {
          it("should call onClick method", () => {
            const mockCallBack = jest.fn();
            const component = shallow(<Button onClick={mockCallBack} />);
            expect(mockCallBack.mock.calls.length).toBe(0);
            component.find(".btn").simulate("click");
            expect(mockCallBack.mock.calls.length).toBe(1);
          });
        });
    </pre>
</div>

<div class="linear" id="Part8">
    <h2>#8 Тестирование методов жизненного цикла (Lifecycle Methods Testing)</h2>

    <p>Папки info</p>

    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;

        class Info extends Component {
          state = {
            value: &amp;quot;Test value&amp;quot;,
            width: 0,
          };

          componentDidMount() {
            this.handleChangeTitle();
            window.addEventListener(&amp;quot;resize&amp;quot;, this.handleWidth);
          }

          componentDidUpdate() {
            this.handleChangeTitle();
          }

          componentWillUnmount() {
            window.removeEventListener(&amp;quot;resize&amp;quot;, this.handleWidth);
          }

          handleChangeTitle = () =&amp;gt; {
            document.title = this.state.value;
          };

          handleWidth = () =&amp;gt; {
            this.setState({
              width: window.innerWidth,
            });
          };

          render() {
            return &amp;lt;h1&amp;gt;{this.state.width}&amp;lt;/h1&amp;gt;;
          }
        }

        export default Info;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import Info from &quot;./info&quot;;

        const componentDidMountSpy = jest.spyOn(Info.prototype, &quot;componentDidMount&quot;);
        const componentDidUpdateSpy = jest.spyOn(Info.prototype, &quot;componentDidUpdate&quot;);
        const componentWillUnmountSpy = jest.spyOn(
          Info.prototype,
          &quot;componentWillUnmount&quot;
        );

        const setUp = () =&gt; shallow(&lt;Info /&gt;);

        describe(&quot;Info component&quot;, () =&gt; {
          let component;
          beforeEach(() =&gt; {
            jest.spyOn(window, &quot;addEventListener&quot;);
            jest.spyOn(window, &quot;removeEventListener&quot;);
            component = setUp();
          });

          afterEach(() =&gt; {
            window.addEventListener.mockRestore();
            window.removeEventListener.mockRestore();
          });

          it(&quot;should render Info component&quot;, () =&gt; {
            expect(component).toMatchSnapshot();
          });

          describe(&quot;Lifecycle methods&quot;, () =&gt; {
            it(&quot;should call componentDidMount once&quot;, () =&gt; {
              expect(componentDidMountSpy).toHaveBeenCalledTimes(1);
            });

            it(&quot;should not call componentWillUnmount when component just mounted&quot;, () =&gt; {
              expect(componentDidMountSpy).toHaveBeenCalledTimes(1);
              expect(componentWillUnmountSpy).toHaveBeenCalledTimes(0);
            });

            it(&quot;should call componentDidUpdate&quot;, () =&gt; {
              component.setProps();
              expect(componentDidUpdateSpy).toHaveBeenCalled();
            });

            it(&quot;should call componentWillUnmount&quot;, () =&gt; {
              component.unmount();
              expect(componentWillUnmountSpy).toHaveBeenCalledTimes(1);
            });
          });

          describe(&quot;Component handlers&quot;, () =&gt; {
            it(&quot;should call addEventListener when component mounted&quot;, () =&gt; {
              expect(window.addEventListener).toHaveBeenCalledTimes(1);
            });

            it(&quot;should call handleChangeTitle in componentDidUpdate&quot;, () =&gt; {
              const instance = setUp().instance();
              instance.handleChangeTitle = jest.fn();
              instance.componentDidUpdate();
              expect(instance.handleChangeTitle).toHaveBeenCalled();
            });

            it(&quot;should call removeEventListener when component unmounted&quot;, () =&gt; {
              component.unmount();
              expect(window.removeEventListener).toHaveBeenCalledTimes(1);
            });

            it(&quot;should call handleWidth during window resize&quot;, () =&gt; {
              expect(component.state().width).toBe(0);
              global.dispatchEvent(new Event(&quot;resize&quot;));
              expect(component.state().width).toBe(window.innerWidth);
            });
          });
        });
    </pre>
</div>

<div class="linear" id="Part9">
    <h2>#9 Тестирование асинхронных запросов (Testing & Mocking Fetch)</h2>

    <p>Папки Posts</p>

    <pre class="brush: js;">
        export const NEWS = [
            {
                author: "Yauhen",
                created_at: "2020-05-03T23:36:09.816Z",
                num_comments: 10,
                objectID: 1,
                title: "Jest & Enzyme",
                points: 100,
                url: "//test.url",
            },
            {
                author: "Stepan",
                created_at: "2020-05-05T23:36:09.816Z",
                num_comments: 8,
                objectID: 2,
                title: "TypeScript Basics",
                points: 10,
                url: "//test2121.url",
            },
        ];

        export const HITS = [
          {
            value: 10,
            label: 10,
          },
          {
            value: 20,
            label: 20,
          },
          {
            value: 40,
            label: 40,
          },
          {
            value: 50,
            label: 50,
          },
        ];

        export const BASE_PATH = 'https://hn.algolia.com/api/v1';
        export const SEARCH_PATH = '/search';
        export const SEARCH_PARAM = 'query=';
        export const PAGE_HITS = 'hitsPerPage=';
        export const PAGE_PARAM = 'page=';
    </pre>
    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;

        import Post from &quot;../Post/post&quot;;
        import Title from &quot;../Title/title&quot;;
        import Select from &quot;../Select/select&quot;;
        import Input from &quot;../Input/input&quot;;
        import Pagination from &quot;../Pagination/pagination&quot;;

        import &quot;./posts.css&quot;;

        import {
          HITS,
          BASE_PATH,
          SEARCH_PATH,
          SEARCH_PARAM,
          PAGE_HITS,
          PAGE_PARAM,
        } from &quot;./constants&quot;;

        class Posts extends Component {
          state = {
            searchQuery: &quot;&quot;,
            result: {},
            hitsPerPage: 20,
            page: 0,
          };

          componentDidMount() {
            const { searchQuery, hitsPerPage, page } = this.state;
            this.fetchData(searchQuery, hitsPerPage, page);
          }

          fetchData = (searchQuery, hitsPerPage, page) =&gt; {
            fetch(
              `${BASE_PATH}${SEARCH_PATH}?${SEARCH_PARAM}${searchQuery}&amp;${PAGE_HITS}${hitsPerPage}&amp;${PAGE_PARAM}${page}`
            )
              .then((res) =&gt; res.json())
              .then((result) =&gt; this.setNews(result))
          };

          handleInputChange = ({ target: { value } }) =&gt; {
            this.setState({
              searchQuery: value,
            });
          };

          handleHitsChange = ({ target: { value } }) =&gt; {
            const { searchQuery } = this.state;

            this.setState(
              {
                hitsPerPage: +value,
                page: 0,
              },
              () =&gt; {
                this.fetchData(searchQuery, this.state.hitsPerPage, 0);
              }
            );
          };

          getSearch = ({ key }) =&gt; {
            if (key === &quot;Enter&quot;) {
              const { searchQuery, hitsPerPage } = this.state;
              this.setState({
                page: 0,
              });
              this.fetchData(searchQuery, hitsPerPage, 0);
            }
          };

          setNews = (result) =&gt; {
            this.setState({ result });
          };

          handlePageChange = ({ target }) =&gt; {
            const btnType = target.getAttribute(&quot;data-name&quot;);
            let { page } = this.state;

            if (!isNaN(btnType)) {
              this.updatePage(+btnType);
            } else {
              if (btnType === &quot;next&quot;) {
                this.updatePage(page + 1);
              }
              if (btnType === &quot;prev&quot;) {
                this.updatePage(page - 1);
              }
            }
          };

          updatePage = (page) =&gt; {
            const { searchQuery, hitsPerPage } = this.state;
            this.setState(
              {
                page,
              },
              () =&gt; {
                this.fetchData(searchQuery, hitsPerPage, page);
              }
            );
          };

          render() {
            const { searchQuery, result, hitsPerPage } = this.state;
            const { hits = [], page, nbPages } = result;

            return (
              &lt;div className=&quot;wrapper&quot;&gt;
                &lt;Title title=&quot;Hacker News&quot; /&gt;
                &lt;Select
                  options={HITS}
                  handleChange={this.handleHitsChange}
                  value={hitsPerPage}
                /&gt;
                {hits.length &gt; 0 &amp;&amp; (
                  &lt;Pagination
                    onClick={this.handlePageChange}
                    page={page}
                    lastPage={nbPages}
                  /&gt;
                )}
                &lt;Input
                  onKeyPress={this.getSearch}
                  onChange={this.handleInputChange}
                  value={searchQuery}
                /&gt;
                &lt;ul className=&quot;newsList&quot;&gt;
                  {hits.map(
                    ({
                      author,
                      created_at,
                      num_comments,
                      objectID,
                      title,
                      points,
                      url,
                    }) =&gt; (
                      &lt;Post
                        key={objectID}
                        author={author}
                        created_at={created_at}
                        num_comments={num_comments}
                        title={title}
                        points={points}
                        url={url}
                      /&gt;
                    )
                  )}
                &lt;/ul&gt;
              &lt;/div&gt;
            );
          }
        }

        export default Posts;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import Posts from &quot;./posts&quot;;
        import {
          NEWS,
          BASE_PATH,
          SEARCH_PATH,
          SEARCH_PARAM,
          PAGE_HITS,
          PAGE_PARAM,
        } from &quot;./constants&quot;;

        const mockJsonPromise = Promise.resolve({ hits: NEWS, page: 1, nbPages: 10 });
        const mockFetchPromise = Promise.resolve({ json: () =&gt; mockJsonPromise });
        global.fetch = jest.fn().mockImplementation(() =&gt; mockFetchPromise);

        const setUp = () =&gt; shallow(&lt;Posts /&gt;);

        describe(&quot;Posts component&quot;, () =&gt; {
          const DEFAULT_PAGE = 10;
          let component;
          let instance;

          beforeEach(() =&gt; {
            component = setUp();
            instance = component.instance();
          });

          it(&quot;should render Posts component&quot;, () =&gt; {
            expect(component).toMatchSnapshot();
          });

          it(&quot;should call fetch in componentDidMount&quot;, () =&gt; {
            expect(global.fetch).toHaveBeenCalledWith(
              `${BASE_PATH}${SEARCH_PATH}?${SEARCH_PARAM}${&quot;&quot;}&amp;${PAGE_HITS}${20}&amp;${PAGE_PARAM}${0}`
            );
          });

          describe(&quot;updatePage method&quot;, () =&gt; {
            it(&quot;should update state &apos;page&apos; value&quot;, () =&gt; {
              instance.updatePage(DEFAULT_PAGE);
              expect(component.state().page).toBe(DEFAULT_PAGE);
            });

            it(&quot;should call fetch with given argument&quot;, () =&gt; {
              instance.updatePage(DEFAULT_PAGE);
              expect(global.fetch).toHaveBeenCalledWith(
                `${BASE_PATH}${SEARCH_PATH}?${SEARCH_PARAM}${&quot;&quot;}&amp;${PAGE_HITS}${20}&amp;${PAGE_PARAM}${DEFAULT_PAGE}`
              );
            });
          });

          describe(&quot;handlePageChange method&quot;, () =&gt; {
            it(&quot;should call &apos;updatePage&apos; with given argument&quot;, () =&gt; {
              instance.updatePage = jest.fn();
              instance.setState({ page: DEFAULT_PAGE });
              instance.handlePageChange({
                target: { getAttribute: jest.fn().mockReturnValue(&quot;1&quot;) },
              });
              expect(instance.updatePage).toHaveBeenCalledWith(1);
            });

            it(&quot;should call &apos;updatePage&apos; with increased value&quot;, () =&gt; {
              instance.updatePage = jest.fn();
              instance.setState({ page: DEFAULT_PAGE });
              instance.handlePageChange({
                target: { getAttribute: jest.fn().mockReturnValue(&quot;prev&quot;) },
              });
              expect(instance.updatePage).toHaveBeenCalledWith(DEFAULT_PAGE - 1);
            });

            it(&quot;should call &apos;updatePage&apos; with decreased value&quot;, () =&gt; {
              instance.updatePage = jest.fn();
              instance.setState({ page: DEFAULT_PAGE });
              instance.handlePageChange({
                target: { getAttribute: jest.fn().mockReturnValue(&quot;next&quot;) },
              });
              expect(instance.updatePage).toHaveBeenCalledWith(DEFAULT_PAGE + 1);
            });
          });

          describe(&quot;Posts handlers&quot;, () =&gt; {
            it(&quot;should handle search input value&quot;, () =&gt; {
              expect(component.state().searchQuery).toBe(&quot;&quot;);
              instance.handleInputChange({ target: { value: &quot;test&quot; } });
              expect(component.state().searchQuery).toBe(&quot;test&quot;);
            });

            it(&quot;should handle change of hits per page&quot;, () =&gt; {
              expect(component.state().hitsPerPage).toBe(20);
              instance.handleHitsChange({ target: { value: String(DEFAULT_PAGE) } });
              expect(component.state().hitsPerPage).toBe(DEFAULT_PAGE);
            });

            it(&quot;should handle change page if &apos;Enter&apos; clicked&quot;, () =&gt; {
              instance.setState({ page: DEFAULT_PAGE });
              instance.getSearch({ key: &quot;Enter&quot; });
              expect(component.state().page).toBe(0);
            });

            it(&quot;should not change page if &apos;a&apos; button clicked&quot;, () =&gt; {
              instance.setState({ page: DEFAULT_PAGE });
              instance.getSearch({ key: &quot;a&quot; });
              expect(component.state().page).toBe(DEFAULT_PAGE);
            });
          });
        });
    </pre>
</div>

<div class="linear" id="Part10">
    <h2>#10 Полное тестирование снимками (Full Snapshot Testing)</h2>

    <p>Папки Pagination</p>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import PropTypes from &quot;prop-types&quot;;

        import &quot;./pagination.css&quot;;

        const renderPaginationBtns = (onClick, page, lastPage) =&gt; {
          const startBtns = [page, page + 1, page + 2];
          const gapBtns = [page - 2, page - 1, page];
          const middleBtn = [&quot;...&quot;];
          const lastBtns = [lastPage - 3, lastPage - 2, lastPage - 1];

          let btnsArr = [];

          if (page &lt; lastPage - 6) {
            btnsArr = [...startBtns, ...middleBtn, ...lastBtns];
          } else if (page &lt; lastPage - 4) {
            btnsArr = [...gapBtns, ...middleBtn, ...lastBtns];
          } else if (page &lt; lastPage - 3) {
            btnsArr = [...gapBtns, ...lastBtns]; // last 6 pages
          } else if (page === 0 &amp;&amp; lastPage === 0) {
            btnsArr = [];
          } else {
            btnsArr = [...middleBtn, ...lastBtns]; // last 3 pages
          }

          return btnsArr.map((num) =&gt; {
            return num === &quot;...&quot; ? (
              num
            ) : (
              &lt;button
                key={num}
                onClick={onClick}
                data-name={num}
                className={num === page ? &quot;active&quot; : &quot;&quot;}
              &gt;
                {num}
              &lt;/button&gt;
            );
          });
        };

        const Pagination = ({ onClick, page, lastPage }) =&gt; (
          &lt;div className=&quot;paginationWrapper&quot;&gt;
            {page !== 0 &amp;&amp; (
              &lt;button onClick={onClick} data-name=&quot;prev&quot;&gt;
                {&quot;&lt;&lt;&quot;}
              &lt;/button&gt;
            )}
            {renderPaginationBtns(onClick, page, lastPage)}
            {page !== lastPage &amp;&amp; (
              &lt;button onClick={onClick} data-name=&quot;next&quot;&gt;
                {&quot;&gt;&gt;&quot;}
              &lt;/button&gt;
            )}
          &lt;/div&gt;
        );

        Pagination.propTypes = {
          onClick: PropTypes.func,
          page: PropTypes.number,
          lastPage: PropTypes.number,
        };

        Pagination.defaultProps = {
          onClick: () =&gt; {},
          page: 0,
          lastPage: 0,
        };

        export default Pagination;
    </pre>
    <p>Тест</p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import Pagination from &quot;./pagination&quot;;

        const setUp = (props) =&gt; shallow(&lt;Pagination {...props} lastPage={20} /&gt;);

        describe(&quot;Pagination component&quot;, () =&gt; {
          it(&quot;should render Pagination without props&quot;, () =&gt; {
            const component = shallow(&lt;Pagination /&gt;);
            expect(component).toMatchSnapshot();
          });

          it(&quot;should render Pagination with props&quot;, () =&gt; {
            const component = setUp();
            expect(component).toMatchSnapshot();
          });

          it(&quot;should render Pagination for last pages&quot;, () =&gt; {
            const component = setUp({ page: 15 });
            expect(component).toMatchSnapshot();
          });

          it(&quot;should render Pagination without 3dots in the middle&quot;, () =&gt; {
            const component = setUp({ page: 16 });
            expect(component).toMatchSnapshot();
          });

          it(&quot;should render Pagination with 3dots and 3 buttons in the end&quot;, () =&gt; {
            const component = setUp({ page: 19 });
            expect(component).toMatchSnapshot();
          });

          describe(&quot;defaultProps&quot;, () =&gt; {
            it(&quot;should use default onChange&quot;, () =&gt; {
              const result = Pagination.defaultProps.onClick();
              expect(result).toBe(undefined);
            });
          });
        });
    </pre>
</div>

<div class="linear" id="Part11">
    <h2>#11 Тестирование утилит (Utils Testing)</h2>

    <p>Папки Utils</p>

    <pre class="brush: js;">
        export const trimString = (string, maxLength) =>
          string && string.trim().length > maxLength
            ? `${string.trim().slice(0, maxLength)}...`
            : string;

        export const getIsValidNumber = (number) => !Number.isNaN(parseInt(number, 10));

        export const removeObjPropImmutably = (obj, prop) => {
          const res = { ...obj };
          delete res[prop];
          return res;
        };
            </pre>
            <p>Тест</p>
            <pre class="brush: js;">
            import { trimString, removeObjPropImmutably, getIsValidNumber } from "./utils";

        describe("trimString util", () => {
          it("Positive trimming cases", () => {
            expect(trimString("LongName", 5)).toBe("LongN...");
            expect(trimString("LongName", 4)).toBe("Long...");
            expect(trimString("LongName", 10)).toBe("LongName");
            expect(trimString("   LongName   ", 3)).toBe("Lon...");
          });

          it("Negative trimming cases", () => {
            expect(trimString("     ", 4)).toBe("     ");
            expect(trimString(null, 4)).toBeNull();
            expect(trimString(undefined, 4)).toBeUndefined();
            // expect(trimString(12345, 4)).toBe("1234...");
          });
        });

        describe("getIsValidNumber util", () => {
          it("Positive checking cases", () => {
            const numbers = [1, 0, -1, 0.5, "123", "321asd"];
            for (let int = 1; int < numbers.length; int++) {
              expect(getIsValidNumber(numbers[int])).toBeTruthy();
            }
          });

          it("Negative checking cases", () => {
            const notNumbers = ["asd321", "qwe", Infinity, undefined, null, [], {}];
            for (let int = 1; int < notNumbers.length; int++) {
              expect(getIsValidNumber(notNumbers[int])).toBeFalsy();
            }
          });
        });

        describe("removeObjPropImmutably util", () => {
          it("Positive removing", () => {
            expect(removeObjPropImmutably({ a: 1, b: 2 }, "b")).toMatchObject({ a: 1 });
            expect(removeObjPropImmutably({ a: () => {}, b: 2 }, "a")).toMatchObject({
              b: 2,
            });
          });

          it("Negative checking cases", () => {
            const notValidObjects = [undefined, null, [], {}, "string", 1];
            for (let int = 1; int < notValidObjects.length; int++) {
              expect(removeObjPropImmutably(notValidObjects[int])).toMatchObject({});
            }
          });
        });
    </pre>
</div>

<div class="linear" id="Part12">
    <h2>#12 Тестирование контекста и портала (Context & Portal Testing)</h2>

    <p>Папки Context И Portal </p>

    <p>Первый пример context</p>
    <p><code>component.js</code></p>
    <pre class="brush: js;">
        import React, { useContext } from &quot;react&quot;;
        import { AuthContext } from &quot;./context&quot;;

        export const ContextComponent = () =&gt; {
          const { isLoggedIn, toggleLogin } = useContext(AuthContext);

          return (
            &lt;&gt;
              &lt;button className=&quot;btn&quot; onClick={toggleLogin}&gt;
                Login
              &lt;/button&gt;
              &lt;div className=&quot;text&quot;&gt;{isLoggedIn.toString()}&lt;/div&gt;
            &lt;/&gt;
          );
        };

        export default ContextComponent;
            &lt;/pre&gt;
            &lt;p&gt;&lt;code&gt;context.js&lt;/code&gt;&lt;/p&gt;
            &lt;pre class=&quot;brush: js;&quot;&gt;

            import React, { useContext } from &amp;quot;react&amp;quot;;
        import { AuthContext } from &amp;quot;./context&amp;quot;;

        export const ContextComponent = () =&amp;gt; {
          const { isLoggedIn, toggleLogin } = useContext(AuthContext);

          return (
            &amp;lt;&amp;gt;
              &amp;lt;button className=&amp;quot;btn&amp;quot; onClick={toggleLogin}&amp;gt;
                Login
              &amp;lt;/button&amp;gt;
              &amp;lt;div className=&amp;quot;text&amp;quot;&amp;gt;{isLoggedIn.toString()}&amp;lt;/div&amp;gt;
            &amp;lt;/&amp;gt;
          );
        };

        export default ContextComponent;
    </pre>

    <p>Тест</p>

    <p><code>context.spec.js</code></p>
    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import { AuthProvider } from &quot;./context&quot;;
        import ContextComponent from &quot;./component&quot;;

        describe(&quot;ContextComponent component&quot;, () =&gt; {
          const component = mount(
            &lt;AuthProvider&gt;
              &lt;ContextComponent /&gt;
            &lt;/AuthProvider&gt;
          );

          it(&quot;should toggle login status&quot;, () =&gt; {
            expect(component.find(&quot;div&quot;).text()).toBe(&quot;false&quot;);
            component.find(&quot;.btn&quot;).simulate(&quot;click&quot;);
            expect(component.find(&quot;div&quot;).text()).toBe(&quot;true&quot;);

            component.find(&quot;.btn&quot;).simulate(&quot;click&quot;);
            expect(component.find(&quot;div&quot;).text()).toBe(&quot;false&quot;);
          });
        });
    </pre>
    <br>
    <p>Второй пример Portal</p>
    <pre class="brush: js;">
        import React, { Component } from &quot;react&quot;;
        import ReactDOM from &quot;react-dom&quot;;

        class Portal extends Component {
          el = document.createElement(&quot;div&quot;).setAttribute(&quot;id&quot;, &quot;portal&quot;);

          componentDidMount() {
            document.body.appendChild(this.el);
          }

          componentWillUnmount() {
            document.body.removeChild(this.el);
          }

          render() {
            return ReactDOM.createPortal(this.props.children, this.el);
          }
        }

        export default Portal;
    </pre>

    <p>Тест</p>

    <pre class="brush: js;">
        import React from &quot;react&quot;;
        import ReactDOM from &quot;react-dom&quot;;
        import Portal from &quot;./Portal&quot;;
        import { shallow } from &quot;enzyme&quot;;

        const componentDidMountSpy = jest.spyOn(Portal.prototype, &quot;componentDidMount&quot;);
        const componentWillUnmountSpy = jest.spyOn(
          Portal.prototype,
          &quot;componentWillUnmount&quot;
        );

        const setUp = () =&gt;
          shallow(
            &lt;Portal&gt;
              &lt;div&gt;webDev&lt;/div&gt;
            &lt;/Portal&gt;
          );

        describe(&quot;Portal component&quot;, () =&gt; {
          let component;

          beforeEach(() =&gt; {
            jest.spyOn(document.body, &quot;appendChild&quot;).mockImplementation(() =&gt; {});
            jest.spyOn(document.body, &quot;removeChild&quot;).mockImplementation(() =&gt; {});
            component = setUp();
          });

          afterEach(() =&gt; {
            document.body.appendChild.mockRestore();
            document.body.removeChild.mockRestore();
          });

          beforeAll(() =&gt; {
            ReactDOM.createPortal = jest.fn((element, node) =&gt; {
              return element;
            });
          });

          afterEach(() =&gt; {
            ReactDOM.createPortal.mockClear();
          });

          it(&quot;should render Portal component&quot;, () =&gt; {
            expect(component).toMatchSnapshot();
          });

          it(&quot;should call appendChild when component mounted&quot;, () =&gt; {
            expect(document.body.appendChild).toHaveBeenCalledTimes(1);
          });

          it(&quot;should call removeChild when component unmounted&quot;, () =&gt; {
            component.unmount();
            expect(document.body.removeChild).toHaveBeenCalledTimes(1);
          });
        });
    </pre>
</div>




<?php include '../include/footer.php'; ?>
