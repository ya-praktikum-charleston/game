/**
 * SyntaxHighlighter
 * http://alexgorbatchev.com/SyntaxHighlighter
 *
 * SyntaxHighlighter is donationware. If you are using it, please donate.
 * http://alexgorbatchev.com/SyntaxHighlighter/donate.html
 *
 * @version
 * 3.0.83 (July 02 2010)
 *
 * @copyright
 * Copyright (C) 2004-2010 Alex Gorbatchev.
 *
 * @license
 * Dual licensed under the MIT and GPL licenses.
 */
(function () {
    // CommonJS
    typeof require != "undefined"
        ? (SyntaxHighlighter = require("shCore").SyntaxHighlighter)
        : null;

    function Brush() {
        var keywords =
            "break case catch continue reverse join" +
            "default delete do else false  " +
            "for function if in instanceof " +
            "new null return super switch clearInterval setInterval" +
            "this throw true try finally typeof var while with " +
            "let alert const console.log split of forEach Object.fromEntries entries " +
            "document getElementById innerHTML querySelector onclick value trim " +
            "import export private public interface " +
            "from window localStorage " +
            "JSON parse stringify toString new Date Array " +
            "constructor this appendTo bind click ready Object create static class " +
            "";

        var react =
            "React createElement ReactDOM render componentWillMount componentDidMount componentWillUnmount shouldComponentUpdate " +
            "unmountComponentAtNode subscribe unsubscribeLogger getState createStore combineReducers useState Component " +
            "setState dispatch onClic nextProps nextState connect createRef state props useContext useReducer useCallback useMemo " +
            "useRef useEffect " +
            "";
        var typescript =
            "HTMLAnchorElement HTMLInputElement HTMLTextAreaElement HTMLSelectElement HTMLButtonElement HTMLDivElement " +
            "ChangeEvent MouseEvent void CSSProperties FocusEvent FormEvent HTMLFormElement ClipboardEvent " +
            "type :string Boolean FC :React ReactNode ReactElement HTMLElement createContext ContextType " +
            "defaultProps number undefined " +
            "";

        var r = SyntaxHighlighter.regexLib;

        this.regexList = [
            { regex: r.multiLineDoubleQuotedString, css: "string" }, // double quoted strings
            { regex: r.multiLineSingleQuotedString, css: "string" }, // single quoted strings
            { regex: r.singleLineCComments, css: "comments" }, // one line comments
            { regex: r.multiLineCComments, css: "comments" }, // multiline comments
            { regex: /\s*#.*/gm, css: "preprocessor" }, // preprocessor tags like #region and #endregion
            { regex: new RegExp(this.getKeywords(keywords), "gm"), css: "keyword" }, // keywords
            { regex: new RegExp(this.getKeywords(react), "gm"), css: "react" }, // typescript
            { regex: new RegExp(this.getKeywords(typescript), "gm"), css: "typescript" }, // typescript
        ];

        this.forHtmlScript(r.scriptScriptTags);
    }

    Brush.prototype = new SyntaxHighlighter.Highlighter();
    Brush.aliases = ["js", "jscript", "javascript"];

    SyntaxHighlighter.brushes.JScript = Brush;

    // CommonJS
    typeof exports != "undefined" ? (exports.Brush = Brush) : null;
})();
