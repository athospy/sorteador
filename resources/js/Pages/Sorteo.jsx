import React, { useState, useEffect, useRef } from "react";
import { Link, useForm, router } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";

export default function Sorteo({ clientes, ganadores }) {
    const { data, setData } = useForm({});
    const [sorteado, setSorteado] = useState();
    const [disabled, setDisabled] = useState(false);
    const [fade, setFade] = useState(true);
    const intervalRef = useRef(null);

    // This effect runs once when the component mounts
    // It starts the timer that randomly selects a client from the list
    // and updates the sorteado state every 100 milliseconds
    useEffect(() => {
        startTimer();

        return () => clearInterval(interval);
    }, []);

    const startTimer = () => {
        intervalRef.current = setInterval(() => {
            const pick = Math.floor(Math.random() * clientes.length);
            setSorteado(clientes[pick].nombre);
            setData("cliente_id", clientes[pick].id);
        }, 100);
    };

    // Function to create a timeout promise
    // This is used to pause the execution for a specified delay
    // It returns a promise that resolves after the delay
    // This is useful for creating delays in the handleSubmit function
    function timeout(delay) {
        return new Promise((res) => setTimeout(res, delay));
    }

    // Function to handle the form submission
    // This will stop the timer, set the fade state to false,
    // and then wait for 1 second before setting the fade state to true
    // It will also send the selected winner to the server
    async function handleSubmit(e) {
        e.preventDefault();
        setDisabled(true);
        setFade(false);
        clearInterval(intervalRef.current);
        intervalRef.current = null;
        await timeout(1000); //for 1 sec delay
        setFade(true);
        startTimer();

        // Send the data to the server
        router.post("/api/ganadores", data),
            {
                onSuccess: () => {
                    console.log("success");
                },
                onError: () => {
                    console.log("error");
                },
            };
    }

    // Function to handle the reset of winners
    // This will reset the list of winners and clear the state
    // It will also send a request to the server to reset the winners
    // and update the UI accordingly
    function handleDelete(e) {
        e.preventDefault();
        router.post("/api/resetear_ganadores"),
            {
                onSuccess: () => {
                    console.log("success");
                },
                onError: () => {
                    console.log("error");
                },
            };
    }

    return (
        <GuestLayout>
            <p className="mb-5 text-center">Choose a winner</p>

            <form name="createForm" className="mb-5" onSubmit={handleSubmit}>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="cedula"
                    >
                        Client
                    </label>
                    <p className="mb-2 text-xl font-bold">{sorteado}</p>
                </div>
                <input type="hidden" value={data.cliente_id} />
                <button
                    className={`px-4 py-2 font-bold text-white bg-blue-500 border-b-4 border-blue-700 rounded hover:bg-blue-400 hover:border-blue-500
                transition-all duration-500 ${
                    fade ? "opacity-100" : "opacity-0"
                }`}
                >
                    Stop
                </button>
                <hr className="my-5" />
                <p className="mb-5 text-center">Winners</p>
                <div className="h-32 overflow-y-auto ">
                    <ul className="list-disc list-inside">
                        {ganadores.map((ganador) => (
                            <li key={ganador.id}>{ganador}</li>
                        ))}
                    </ul>
                </div>
            </form>
            <button
                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                onClick={handleDelete}
            >
                Reset the winners
            </button>
        </GuestLayout>
    );
}
