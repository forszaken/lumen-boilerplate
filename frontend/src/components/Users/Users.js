import React from 'react';
import './users.module.css';
import Axios from "axios";

class Users extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            items: []
        };
    }
    componentDidMount() {
        Axios.get("http://localhost:8091/api/users")
            .then((response) => {
                this.setState({
                    isLoaded: true,
                    items: response.data
                });
            },
                (error) => {
                    this.setState({
                        isLoaded: true,
                        error
                    })
                }
                )
    }

    render() {
        const { error, isLoaded, items } = this.state;
        if (error) {
            return <div>Ошибка: {error.message + items}</div>;
        } else if (!isLoaded) {
            return <div>Загрузка...</div>;
        } else {
            return (
                <ul>
                    {items.map(item => (
                        <li key={item.name}>
                            {item.name} {item.github}
                        </li>
                    ))}
                </ul>
            );
        }
    }
}
export default Users;