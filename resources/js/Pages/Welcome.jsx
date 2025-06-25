import React from "react";
import { Link, useForm, router } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const { data, setData, errors, post } = useForm({
        title: "",
        description: "",
    });

    function handleSubmit(e) {
        e.preventDefault();
        router.post("/api/clientes", data),
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
            <p className="mb-5 text-center">
                Enter your details to register for the Shell Helix Ultra
                promotion.
            </p>

            <form name="createForm" className="mb-5" onSubmit={handleSubmit}>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="cedula"
                    >
                        Identification Number (Cédula de Identidad)
                    </label>
                    <input
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.cedula}
                        onChange={(e) => setData("cedula", e.target.value)}
                        type="text"
                        placeholder="cedula"
                    />
                </div>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="nombre"
                    >
                        Name and Surname
                    </label>
                    <input
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.nombre}
                        onChange={(e) => setData("nombre", e.target.value)}
                        type="text"
                        placeholder="nombre"
                    />
                </div>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="ciudad"
                    >
                        City
                    </label>
                    <select
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.ciudad}
                        onChange={(e) => setData("ciudad", e.target.value)}
                    >
                        <option value="Asunción">Asunción</option>
                        <option value="San Lorenzo">San Lorenzo</option>
                        <option value="Luque">Luque</option>
                        <option value="Capiatá">Capiatá</option>
                        <option value="Lambaré">Lambaré</option>
                        <option value="Fernando de la Mora">
                            Fernando de la Mora
                        </option>
                        <option value="Limpio">Limpio</option>
                        <option value="Ñemby">Ñemby</option>
                        <option value="Mariano Roque Alonso">
                            Mariano Roque Alonso
                        </option>
                        <option value="Villa Elisa">Villa Elisa</option>
                        <option value="San Antonio">San Antonio</option>
                        <option value="Itauguá">Itauguá</option>
                        <option value="Villeta">Villeta</option>
                        <option value="Ypané">Ypané</option>
                        <option value="Areguá">Areguá</option>
                        <option value="Itá">Itá</option>
                        <option value="J. Augusto Saldívar">
                            J. Augusto Saldívar
                        </option>
                        <option value="Guarambaré">Guarambaré</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="local"
                    >
                        Local where you purchased the product
                    </label>
                    <select
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.local}
                        onChange={(e) => setData("local", e.target.value)}
                    >
                        <option value="Shell Arroyos y Esteros - KM 52">
                            Shell Arroyos y Esteros - KM 52
                        </option>
                        <option value="Shell Mcal. Estigarribia - KM 57">
                            Shell Mcal. Estigarribia - KM 57
                        </option>
                        <option value="Shell Arroyos y Esteros - KM 66.5">
                            Shell Arroyos y Esteros - KM 66.5
                        </option>
                        <option value="Shell Emboscada - KM 38">
                            Shell Emboscada - KM 38
                        </option>
                        <option value="Shell Tobati - Mbopicua">
                            Shell Tobati - Mbopicua
                        </option>
                        <option value="Shell Limpio - Ruta 3">
                            Shell Limpio - Ruta 3
                        </option>
                        <option value="Shell Transchaco KM 33">
                            Shell Transchaco KM 33
                        </option>
                        <option value="Shell Limpio - Desvio a Salado">
                            Shell Limpio - Desvio a Salado
                        </option>
                        <option value="Shell Limpio - Ruta Transchaco">
                            Shell Limpio - Ruta Transchaco
                        </option>
                        <option value="Shell Ruta Luque - San Bernardino KM 42">
                            Shell Ruta Luque - San Bernardino KM 42
                        </option>
                        <option value="Shell Limpio - KM 20 1/2">
                            Shell Limpio - KM 20 1/2
                        </option>
                        <option value="Shell MRA - KM 20">
                            Shell MRA - KM 20
                        </option>
                        <option value="Shell Luque - Avda. Wenceslao M">
                            Shell Luque - Avda. Wenceslao M
                        </option>
                        <option value="Shell Luque - Yukuyry">
                            Shell Luque - Yukuyry
                        </option>
                        <option value="Shell Aregua KM 28">
                            Shell Aregua KM 28
                        </option>
                        <option value="Shell MRA - 900mts Puente Remanso">
                            Shell MRA - 900mts Puente Remanso
                        </option>
                        <option value="Shell Luque - B. González">
                            Shell Luque - B. González
                        </option>
                        <option value="Shell Mora Cue">Shell Mora Cue</option>
                        <option value="Shell MRA - Cnel. Hermosilla">
                            Shell MRA - Cnel. Hermosilla
                        </option>
                        <option value="Shell Luque - Maestro Félix">
                            Shell Luque - Maestro Félix
                        </option>
                        <option value="Shell Luque - Rosario N°10">
                            Shell Luque - Rosario N°10
                        </option>
                        <option value="Shell MRA - KM 14 1/2">
                            Shell MRA - KM 14 1/2
                        </option>
                        <option value="Shell Luque - Aregua">
                            Shell Luque - Aregua
                        </option>
                        <option value="Shell Caacupe KM 55">
                            Shell Caacupe KM 55
                        </option>
                        <option value="Shell Caacupé - KM 52">
                            Shell Caacupé - KM 52
                        </option>
                        <option value="Shell MRA - Herrera">
                            Shell MRA - Herrera
                        </option>
                        <option value="Shell Caacupé - KM 56">
                            Shell Caacupé - KM 56
                        </option>
                        <option value="Shell Caacupé - Ruta N°2">
                            Shell Caacupé - Ruta N°2
                        </option>
                        <option value="Shell Luque - Ñu Guazú">
                            Shell Luque - Ñu Guazú
                        </option>
                        <option value="Shell Ruta Luque - San Lorenzo">
                            Shell Ruta Luque - San Lorenzo
                        </option>
                        <option value="Shell Semidei">Shell Semidei</option>
                        <option value="Shell Luque - Gral. Aquino">
                            Shell Luque - Gral. Aquino
                        </option>
                        <option value="Shell Puerto Caacupemi">
                            Shell Puerto Caacupemi
                        </option>
                        <option value="Shell Caacupé - Ruta a Pirayu KM 51">
                            Shell Caacupé - Ruta a Pirayu KM 51
                        </option>
                        <option value="Shell Ruta Luque - San Lorenzo">
                            Shell Ruta Luque - San Lorenzo
                        </option>
                        <option value="Shell Ypacarai - Ruta N°2">
                            Shell Ypacarai - Ruta N°2
                        </option>
                        <option value="Shell Ypacarai - KM 36">
                            Shell Ypacarai - KM 36
                        </option>
                        <option value="Shell Itaugua - KM 30">
                            Shell Itaugua - KM 30
                        </option>
                        <option value="Shell Capiatá - Santo Domingo">
                            Shell Capiatá - Santo Domingo
                        </option>
                        <option value="Shell Capiata - KM 19/2">
                            Shell Capiata - KM 19/2
                        </option>
                        <option value="Shell 1er Presidente">
                            Shell 1er Presidente
                        </option>
                        <option value="Shell Julio Correa">
                            Shell Julio Correa
                        </option>
                        <option value="Shell Botánico">Shell Botánico</option>
                        <option value="Shell Itaugua 2 KM 25">
                            Shell Itaugua 2 KM 25
                        </option>
                        <option value="Shell Molas López">
                            Shell Molas López
                        </option>
                        <option value="Shell Eusebio Ayala - KM 72">
                            Shell Eusebio Ayala - KM 72
                        </option>
                        <option value="Shell Fdo. de la Mora - Mcal. López">
                            Shell Fdo. de la Mora - Mcal. López
                        </option>
                        <option value="Shell San Lorenzo - Manuel Ortiz Guerrero">
                            Shell San Lorenzo - Manuel Ortiz Guerrero
                        </option>
                        <option value="Shell Fdo. de la Mora - Don Bosco">
                            Shell Fdo. de la Mora - Don Bosco
                        </option>
                        <option value="Shell San Lorenzo - Eugenio A. Garay">
                            Shell San Lorenzo - Eugenio A. Garay
                        </option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="nro_factura"
                    >
                        last 3 digits of the invoice number
                    </label>
                    <input
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.nro_factura}
                        onChange={(e) => setData("nro_factura", e.target.value)}
                        type="text"
                        placeholder="123"
                    />
                </div>
                <div className="mb-4">
                    <label
                        className="block mb-2 text-sm font-bold text-gray-700"
                        htmlFor="producto"
                    >
                        Product Purchased
                    </label>
                    <select
                        className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        value={data.producto}
                        onChange={(e) => setData("producto", e.target.value)}
                    >
                        <option value="Shell Helix Ultra 5W-30">
                            Shell Helix Ultra 5W-30
                        </option>
                        <option value="Shell Helix Ultra 5W-40">
                            Shell Helix Ultra 5W-40
                        </option>
                        <option value="Shell Helix Ultra SN 0W-20">
                            Shell Helix Ultra SN 0W-20
                        </option>
                    </select>
                </div>

                <div className="flex items-center justify-between">
                    <button
                        className="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Register
                    </button>
                </div>
            </form>
        </GuestLayout>
    );
}
