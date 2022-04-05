import { unset } from "lodash";
import React from "react";
import ReactDOM from "react-dom/client";

import ReactGPicker from "react-gcolor-picker";

// export default function App() {
//   const onChange = (value) => {
//     console.log(value);
//   };

//   return (
//     <ReactGPicker value='linear-gradient(0deg, rgb(255, 177, 153) 0%, rgb(255, 8, 68) 100%)' gradient="true" debounceMS="300" popupWidth="480" defaultColors={['linear-gradient(0deg, rgb(255, 177, 153) 0%, rgb(255, 8, 68) 100%)','linear-gradient(270deg, rgb(251, 171, 126) 8.00%, rgb(247, 206, 104) 92.00%)']} onChange={onChange} />

//   );
// }

// ReactDOM.createRoot(document.getElementById("gradient")).render(<App />);

fetch("/admin/settings/colors")
    .then((res) => res.json())
    .then((json) => {
        document.querySelectorAll(".gpickr").forEach((el, index) => {
            class App extends React.Component {
                state = {
                    value: json[index].value ?? "",
                    name: json[index].key,
                };

                handleChange = (e) => {
                    this.setState({
                        value: e.target.value,
                    });
                };
                onChange = (value) => {
                    this.setState({
                        value,
                    });
                };
                render() {
                    return [
                        <ReactGPicker key={0} 
                            value={this.state.value}
                            gradient={
                                json[index].type === "color" ? false : true
                            }
                            debounceMS="300"
                            popupWidth={unset}
                            defaultColors={[
                                "linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(0, 0, 0) 100%)",
                                "linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(0, 0, 0) 100%)",
                                "linear-gradient(270deg, rgb(255, 255, 255) 0%, rgb(0, 0, 0) 100%)",
                            ]}
                            onChange={this.onChange}
                        />,
                        <input key={1} 
                            name={this.state.name}
                            className="gpickr-output"
                            type="text"
                            onChange={this.handleChange}
                            value={this.state.value}
                        />,
                    ];
                }
            }
            ReactDOM.createRoot(el).render(<App />);
        });
    });
