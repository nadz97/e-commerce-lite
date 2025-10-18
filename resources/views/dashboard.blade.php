<x-app-layout>

    <div class="flex flex-col h-full">
        {{-- <h1 class="text-2xl sm:text-3xl font-bold text-brand mb-4 sm:mb-6">Dashboard</h1> --}}

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
            <!-- Example Card 1 -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout text-center flex-1 border-b-2 border-b-[#DB2777]">
                <i class="fas fa-users text-2xl sm:text-3xl text-brand mb-2 text-[#DB2777]"></i>
                <h2 class="text-lg sm:text-xl font-semibold text-brand mb-2">Total Users</h2>
                <p class="text-2xl sm:text-3xl font-bold text-brand text-[#DB2777]">1,234</p>
            </div>

            <!-- Example Card 2 -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout text-center flex-1 border-b-2 border-b-[#0D9488]">
                <i class="fas fa-dollar-sign text-2xl sm:text-3xl  mb-2 text-[#0D9488]"></i>
                <h2 class="text-lg sm:text-xl font-semibold text-brand mb-2">Sales Today</h2>
                <p class="text-2xl sm:text-3xl font-bold  text-[#0D9488]">$5,678</p>
            </div>

            <!-- Example Card 3 -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout text-center flex-1 border-b-2 border-b-[#5B21B6]">
                <i class="fas fa-shopping-cart text-2xl sm:text-3xl  mb-2 text-[#5B21B6]"></i>
                <h2 class="text-lg sm:text-xl font-semibold text-brand mb-2">New Orders</h2>
                <p class="text-2xl sm:text-3xl font-bold  text-[#5B21B6]">89</p>
            </div>

            <!-- Example Card 4 -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout text-center flex-1 border-b-2 border-b-[#3B82F6]">
                <i class="fas fa-user-plus text-2xl sm:text-3xl mb-2 text-[#3B82F6]"></i>
                <h2 class="text-lg sm:text-xl font-semibold text-brand mb-2">New Customers</h2>
                <p class="text-2xl sm:text-3xl font-bold text-[#3B82F6]">42</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 mt-4 sm:mt-6">
            <!-- Total Orders -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout flex items-center gap-4 border-b-2 border-b-[#0D9488] flex-1">
                <div class="text-2xl sm:text-3xl text-[#0D9488]">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-sm text-brand">Total Orders</span>
                    <span class="text-lg font-semibold text-[#0D9488]">1,240</span>
                </div>
            </div>

            <!-- Pending Orders -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout flex items-center gap-4 border-b-2 border-b-[#5B21B6] flex-1">
                <div class="text-2xl sm:text-3xl text-[#5B21B6]">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-sm text-brand ">Orders Pending</span>
                    <span class="text-lg font-semibold text-[#5B21B6]">85</span>
                </div>
            </div>

            <!-- Delivered Orders -->
            <div
                class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout flex items-center gap-4 border-b-2 border-b-[#3B82F6] flex-1">
                <div class="text-2xl sm:text-3xl text-[#3B82F6]">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-sm text-brand">Orders Delivered</span>
                    <span class="text-lg font-semibold text-[#3B82F6]">1,120</span>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="bg-white/10 p-4 sm:p-6 rounded-2xl shadow-popout mt-6 sm:mt-8 flex-1 flex flex-col min-h-0">
            <h2 class="text-xl sm:text-2xl font-bold text-brand mb-4">Recent Orders</h2>
            <div class="overflow-x-auto -mx-4 sm:mx-0 flex-1 overflow-y-auto">
                <div class="inline-block min-w-full align-middle px-4 sm:px-0">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/10 text-brand/80 uppercase text-xs sm:text-sm">
                                <th class="p-2 sm:p-3 whitespace-nowrap">Order ID</th>
                                <th class="p-2 sm:p-3 whitespace-nowrap">Customer</th>
                                <th class="p-2 sm:p-3 whitespace-nowrap">Date</th>
                                <th class="p-2 sm:p-3 whitespace-nowrap">Status</th>
                                <th class="p-2 sm:p-3 text-right whitespace-nowrap">Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-brand/90 text-sm sm:text-base">
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-2 sm:p-3 whitespace-nowrap">#1001</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">John Doe</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">2025-10-01</td>
                                <td class="p-2 sm:p-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-yellow-200/30 text-yellow-500 text-xs font-semibold whitespace-nowrap">Pending</span>
                                </td>
                                <td class="p-2 sm:p-3 text-right whitespace-nowrap">$120.00</td>
                            </tr>
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-2 sm:p-3 whitespace-nowrap">#1002</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">Jane Smith</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">2025-10-02</td>
                                <td class="p-2 sm:p-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-green-200/30 text-green-500 text-xs font-semibold whitespace-nowrap">Delivered</span>
                                </td>
                                <td class="p-2 sm:p-3 text-right whitespace-nowrap">$89.99</td>
                            </tr>
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-2 sm:p-3 whitespace-nowrap">#1003</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">Bob Lee</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">2025-10-03</td>
                                <td class="p-2 sm:p-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-red-200/30 text-red-500 text-xs font-semibold whitespace-nowrap">Cancelled</span>
                                </td>
                                <td class="p-2 sm:p-3 text-right whitespace-nowrap">$55.50</td>
                            </tr>
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-2 sm:p-3 whitespace-nowrap">#1004</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">Alice Wong</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">2025-10-03</td>
                                <td class="p-2 sm:p-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-green-200/30 text-green-500 text-xs font-semibold whitespace-nowrap">Delivered</span>
                                </td>
                                <td class="p-2 sm:p-3 text-right whitespace-nowrap">$210.00</td>
                            </tr>
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-2 sm:p-3 whitespace-nowrap">#1005</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">Charlie Kim</td>
                                <td class="p-2 sm:p-3 whitespace-nowrap">2025-10-04</td>
                                <td class="p-2 sm:p-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-yellow-200/30 text-yellow-500 text-xs font-semibold whitespace-nowrap">Pending</span>
                                </td>
                                <td class="p-2 sm:p-3 text-right whitespace-nowrap">$45.75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-app-layout>
