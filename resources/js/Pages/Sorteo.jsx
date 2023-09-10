import React, { useState, useEffect, useRef } from "react";
import { Link, useForm, router } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";

export default function Sorteo({ clientes, ganadores }) {
    const { data, setData } = useForm({});
    const [sorteado, setSorteado] = useState();
    const [disabled, setDisabled] = useState(false);
    const [fade, setFade] = useState(true);
    const intervalRef = useRef(null);

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

    function timeout(delay) {
        return new Promise((res) => setTimeout(res, delay));
    }

    async function handleSubmit(e) {
        e.preventDefault();
        setDisabled(true);
        setFade(false);
        clearInterval(intervalRef.current);
        intervalRef.current = null;
        await timeout(1000); //for 1 sec delay
        setFade(true);
        startTimer();

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
            <p className="mb-5 text-center">Sorteador</p>

            <form name="createForm" className="mb-5" onSubmit={handleSubmit}>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="cedula"
                    >
                        Cliente
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
                    Parar
                </button>
                <hr className="my-5" />
                <p className="mb-5 text-center">Ganadores</p>
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
                Resetear lista de ganadores
            </button>
        </GuestLayout>
    );
}
